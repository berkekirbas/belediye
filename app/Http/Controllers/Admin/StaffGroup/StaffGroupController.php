<?php

namespace App\Http\Controllers\Admin\StaffGroup;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StaffGroupCreateRequest;
use App\Http\Requests\Admin\StaffGroupUpdateRequest;
use App\Models\StaffGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StaffGroupController extends Controller
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
            $groups = StaffGroup::orderBy('order')->get();

            $rows = $groups->map(function ($group) {
                $editUrl = route('staff-group.edit', $group->id);
                $deleteUrl = route('staff-group.destroy', $group->id);

                $statusBadge = $group->is_active
                    ? '<span class="badge bg-success">Aktif</span>'
                    : '<span class="badge bg-danger">Pasif</span>';

                $actions = '
                    <a href="' . $editUrl . '" class="btn btn-warning btn-sm">Düzenle</a>
                    <form action="' . $deleteUrl . '" method="POST" style="display:inline-block;">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Bu grubu silmek istediğinize emin misiniz?\')">Sil</button>
                    </form>';

                return [
                    'name' => e($group->name),
                    'slug' => e($group->slug),
                    'status' => $statusBadge,
                    'order' => $group->order,
                    'actions' => $actions,
                ];
            });

            return datatables()->collection($rows)
                ->rawColumns(['status', 'actions'])
                ->make(true);
        }

        return view('panel.staff-group.index');
    }

    public function add()
    {
        return view('panel.staff-group.add');
    }

    public function store(StaffGroupCreateRequest $request)
    {
        try {
            StaffGroup::create([
                'name' => $request->name,
                'slug' => $this->generateSlug($request->name),
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'is_active' => $request->has('is_active') ? 1 : 0,
                'order' => (int) $request->order,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Personel grubu oluşturulurken bir hata oluştu: ' . $e->getMessage()]);
        }

        return redirect()->route('staff-group')->with('success', 'Personel Grubu Başarıyla Eklendi');
    }

    public function edit($id)
    {
        $group = StaffGroup::findOrFail($id);

        return view('panel.staff-group.edit', compact('group'));
    }

    public function update(StaffGroupUpdateRequest $request, $id)
    {
        $group = StaffGroup::findOrFail($id);

        try {
            $group->update([
                'name' => $request->name,
                'slug' => $this->generateSlug($request->name),
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'is_active' => $request->has('is_active') ? 1 : 0,
                'order' => (int) $request->order,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Personel grubu güncellenirken bir hata oluştu: ' . $e->getMessage()]);
        }

        return redirect()->route('staff-group')->with('success', 'Personel Grubu Başarıyla Güncellendi');
    }

    public function destroy($id)
    {
        $group = StaffGroup::findOrFail($id);
        $group->delete();

        return redirect()->route('staff-group')->with('success', 'Personel Grubu Başarıyla Silindi');
    }
}
