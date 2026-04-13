<?php

namespace App\Http\Controllers\Admin\Activity;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ActivityCreateRequest;
use App\Http\Requests\Admin\ActivityUpdateRequest;
use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ActivityController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $activities = Activity::with('activity_translations')->orderBy('order')->get();

            $rows = $activities->map(function ($activity) {
                $translation = $activity->activity_translation('tr');
                $editUrl = route('activity.edit', $activity->id);
                $deleteUrl = route('activity.destroy', $activity->id);

                $imageHtml = $activity->image
                    ? '<span
                        class="badge bg-success preview-image-btn"
                        style="cursor:pointer"
                        data-image="' . e($activity->image_url) . '">
                        Resmi Gör
                    </span>'
                    :
                    '<span class="badge bg-danger">
                         Resim Yok
                    </span>';

                $statusBadge = $activity->is_active
                    ? '<span class="badge bg-success">Aktif</span>'
                    : '<span class="badge bg-danger">Pasif</span>';

                $actions = '
                    <a href="' . $editUrl . '" class="btn btn-warning btn-sm">Düzenle</a>
                    <form action="' . $deleteUrl . '" method="POST" style="display:inline-block;">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Bu etkinliği silmek istediğinize emin misiniz?\')">Sil</button>
                    </form>';

                return [
                    'image' => $imageHtml,
                    'title' => $translation ? e($translation->title) : '-',
                    'status' => $statusBadge,
                    'order' => $activity->order,
                    'actions' => $actions,
                ];
            });

            return datatables()->collection($rows)
                ->rawColumns(['image', 'status', 'actions'])
                ->make(true);
        }

        return view('panel.activity.index');
    }

    public function add()
    {
        return view('panel.activity.add');
    }

    public function store(ActivityCreateRequest $request)
    {
        try {
            $imageName = null;
            if ($request->hasFile('image')) {
                $imageName = hash('sha256', $request->file('image')->getClientOriginalName() . time())
                    . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->storeAs('activity', $imageName, 'public');
            }

            $activity = Activity::create([
                'image' => $imageName,
                'is_active' => $request->has('is_active') ? 1 : 0,
                'order' => (int) $request->order,
            ]);

            $activity->activity_translations()->create([
                'language_code' => 'tr',
                'title' => $request->title,
                'content' => $request->content,
                'location' => $request->location,
                'slug' => Str::slug($request->title),
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Etkinlik oluşturulurken bir hata oluştu: ' . $e->getMessage()]);
        }

        return redirect()->route('activity')->with('success', 'Etkinlik Başarıyla Eklendi');
    }

    public function edit($id)
    {
        $activity = Activity::with('activity_translations')->findOrFail($id);
        $translation = $activity->activity_translation('tr');

        return view('panel.activity.edit', compact('activity', 'translation'));
    }

    public function update(ActivityUpdateRequest $request, $id)
    {
        $activity = Activity::findOrFail($id);

        try {
            $imageName = $activity->image;
            if ($request->hasFile('image')) {
                if ($activity->image) {
                    Storage::delete('activity/' . $activity->image, 'public');
                }
                $imageName = hash('sha256', $request->file('image')->getClientOriginalName() . time())
                    . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->storeAs('activity', $imageName, 'public');
            }

            $activity->update([
                'image' => $imageName,
                'is_active' => $request->has('is_active') ? 1 : 0,
                'order' => (int) $request->order,
            ]);

            $translation = $activity->activity_translation('tr');
            if ($translation) {
                $translation->update([
                    'title' => $request->title,
                    'content' => $request->content,
                    'location' => $request->location,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                    'meta_keywords' => $request->meta_keywords,
                    'meta_description' => $request->meta_description,
                    'slug' => Str::slug($request->title),
                ]);
            } else {
                $activity->translations()->create([
                    'language_code' => 'tr',
                    'title' => $request->title,
                    'content' => $request->content,
                    'location' => $request->location,
                    'start_date' => $request->start_date,
                    'end_date' => $request->end_date,
                    'meta_keywords' => $request->meta_keywords,
                    'meta_description' => $request->meta_description,
                    'slug' => Str::slug($request->title),
                ]);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Etkinlik güncellenirken bir hata oluştu: ' . $e->getMessage()]);
        }

        return redirect()->route('activity')->with('success', 'Etkinlik Başarıyla Güncellendi');
    }

    public function destroy($id)
    {
        $activity = Activity::findOrFail($id);

        if ($activity->image) {
            Storage::delete('activity/' . $activity->image, 'public');
        }

        $activity->delete();

        return redirect()->route('activity')->with('success', 'Etkinlik Başarıyla Silindi');
    }
}
