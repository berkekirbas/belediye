<?php

namespace App\Http\Controllers\Admin\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StaffCreateRequest;
use App\Http\Requests\Admin\StaffUpdateRequest;
use App\Models\Staff;
use App\Models\StaffGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StaffController extends Controller
{
    private function generateSlug($text)
    {
        $turkishMap = ['ç' => 'c', 'Ç' => 'c', 'ğ' => 'g', 'Ğ' => 'g', 'ı' => 'i', 'İ' => 'i', 'ö' => 'o', 'Ö' => 'o', 'ş' => 's', 'Ş' => 's', 'ü' => 'u', 'Ü' => 'u'];
        $text = strtr($text, $turkishMap);
        return Str::slug($text);
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $staffs = Staff::with('staff_group')->orderBy('order')->get();

            $rows = $staffs->map(function ($staff) {
                $editUrl = route('staff.edit', $staff->id);
                $deleteUrl = route('staff.destroy', $staff->id);

                $imageHtml = $staff->image
                    ? '<span class="badge bg-success preview-image-btn" style="cursor:pointer" data-image="' . e($staff->image_url) . '">Resmi Gör</span>'
                    : '<span class="badge bg-danger">Resim Yok</span>';

                $statusBadge = $staff->is_active
                    ? '<span class="badge bg-success">Aktif</span>'
                    : '<span class="badge bg-danger">Pasif</span>';

                $actions = '
                    <a href="' . $editUrl . '" class="btn btn-warning btn-sm">Düzenle</a>
                    <form action="' . $deleteUrl . '" method="POST" style="display:inline-block;">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Bu personeli silmek istediğinize emin misiniz?\')">Sil</button>
                    </form>';

                return [
                    'image' => $imageHtml,
                    'full_name' => e($staff->full_name),
                    'title' => e($staff->title ?? '-'),
                    'group' => e($staff->staff_group->name ?? '-'),
                    'status' => $statusBadge,
                    'order' => $staff->order,
                    'actions' => $actions,
                ];
            });

            return datatables()->collection($rows)
                ->rawColumns(['image', 'status', 'actions'])
                ->make(true);
        }

        return view('panel.staff.index');
    }

    public function add()
    {
        $groups = StaffGroup::where('is_active', 1)->orderBy('order')->get();

        return view('panel.staff.add', compact('groups'));
    }

    public function store(StaffCreateRequest $request)
    {
        try {
            $imageName = null;
            if ($request->hasFile('image')) {
                $imageName = hash('sha256', $request->file('image')->getClientOriginalName() . time())
                    . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->storeAs('staff', $imageName, 'public');
            }

            Staff::create([
                'staff_group_id' => $request->staff_group_id,
                'full_name' => $request->full_name,
                'slug' => $this->generateSlug($request->full_name),
                'title' => $request->title,
                'image' => $imageName,
                'facebook_url' => $request->facebook_url,
                'twitter_url' => $request->twitter_url,
                'instagram_url' => $request->instagram_url,
                'email' => $request->email,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'content' => $request->content,
                'is_active' => $request->has('is_active') ? 1 : 0,
                'order' => (int) $request->order,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Personel oluşturulurken bir hata oluştu: ' . $e->getMessage()]);
        }

        return redirect()->route('staff')->with('success', 'Personel Başarıyla Eklendi');
    }

    public function edit($id)
    {
        $staff = Staff::findOrFail($id);
        $groups = StaffGroup::where('is_active', 1)->orderBy('order')->get();

        return view('panel.staff.edit', compact('staff', 'groups'));
    }

    public function update(StaffUpdateRequest $request, $id)
    {
        $staff = Staff::findOrFail($id);

        try {
            $imageName = $staff->image;
            if ($request->hasFile('image')) {
                if ($staff->image) {
                    Storage::delete('staff/' . $staff->image, 'public');
                }
                $imageName = hash('sha256', $request->file('image')->getClientOriginalName() . time())
                    . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->storeAs('staff', $imageName, 'public');
            }

            $staff->update([
                'staff_group_id' => $request->staff_group_id,
                'full_name' => $request->full_name,
                'slug' => $this->generateSlug($request->full_name),
                'title' => $request->title,
                'image' => $imageName,
                'facebook_url' => $request->facebook_url,
                'twitter_url' => $request->twitter_url,
                'instagram_url' => $request->instagram_url,
                'email' => $request->email,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'content' => $request->content,
                'is_active' => $request->has('is_active') ? 1 : 0,
                'order' => (int) $request->order,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Personel güncellenirken bir hata oluştu: ' . $e->getMessage()]);
        }

        return redirect()->route('staff')->with('success', 'Personel Başarıyla Güncellendi');
    }

    public function destroy($id)
    {
        $staff = Staff::findOrFail($id);

        if ($staff->image) {
            Storage::delete('staff/' . $staff->image, 'public');
        }

        $staff->delete();

        return redirect()->route('staff')->with('success', 'Personel Başarıyla Silindi');
    }
}
