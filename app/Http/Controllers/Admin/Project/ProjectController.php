<?php

namespace App\Http\Controllers\Admin\Project;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectCreateRequest;
use App\Http\Requests\Admin\ProjectUpdateRequest;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\ProjectImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $projects = Project::with(['project_translations', 'category'])->orderBy('order')->get();

            $rows = $projects->map(function ($project) {
                $translation = $project->project_translation('tr');
                $editUrl = route('project.edit', $project->id);
                $deleteUrl = route('project.destroy', $project->id);

                $imageHtml = $project->image
                    ? '<span
                        class="badge bg-success preview-image-btn"
                        style="cursor:pointer"
                        data-image="' . e($project->image_url) . '">
                        Resmi Gör
                    </span>'
                    : '<span class="badge bg-danger">Resim Yok</span>';

                $statusBadge = $project->is_active
                    ? '<span class="badge bg-success">Aktif</span>'
                    : '<span class="badge bg-danger">Pasif</span>';

                $actions = '
                    <a href="' . $editUrl . '" class="btn btn-warning btn-sm">Düzenle</a>
                    <form action="' . $deleteUrl . '" method="POST" style="display:inline-block;">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Bu projeyi silmek istediğinize emin misiniz?\')">Sil</button>
                    </form>';

                return [
                    'image' => $imageHtml,
                    'title' => $translation ? e($translation->title) : '-',
                    'category' => $project->category ? e($project->category->name) : '-',
                    'status' => $statusBadge,
                    'order' => $project->order,
                    'actions' => $actions,
                ];
            });

            return datatables()->collection($rows)
                ->rawColumns(['image', 'status', 'actions'])
                ->make(true);
        }

        return view('panel.project.index');
    }

    public function add()
    {
        $categories = ProjectCategory::where('is_active', 1)->orderBy('order')->get();

        return view('panel.project.add', compact('categories'));
    }

    public function store(ProjectCreateRequest $request)
    {
        try {
            $imageName = null;
            if ($request->hasFile('image')) {
                $imageName = hash('sha256', $request->file('image')->getClientOriginalName() . time())
                    . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->storeAs('projects', $imageName, 'public');
            }

            $project = Project::create([
                'project_category_id' => $request->project_category_id,
                'image' => $imageName,
                'is_active' => $request->has('is_active') ? 1 : 0,
                'order' => (int) $request->order,
            ]);

            $project->project_translations()->create([
                'language_code' => 'tr',
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'content' => $request->content,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
            ]);

            if ($request->hasFile('photos')) {
                foreach ($request->file('photos') as $index => $photo) {
                    $photoName = hash('sha256', $photo->getClientOriginalName() . time() . $index)
                        . '.' . $photo->getClientOriginalExtension();
                    $photo->storeAs('project-images', $photoName, 'public');

                    $project->images()->create([
                        'image' => $photoName,
                        'order' => $index,
                    ]);
                }
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Proje oluşturulurken bir hata oluştu: ' . $e->getMessage()]);
        }

        return redirect()->route('project')->with('success', 'Proje Başarıyla Eklendi');
    }

    public function edit($id)
    {
        $project = Project::with(['project_translations', 'images'])->findOrFail($id);
        $translation = $project->project_translation('tr');
        $categories = ProjectCategory::where('is_active', 1)->orderBy('order')->get();

        return view('panel.project.edit', compact('project', 'translation', 'categories'));
    }

    public function update(ProjectUpdateRequest $request, $id)
    {
        $project = Project::findOrFail($id);

        try {
            $imageName = $project->image;
            if ($request->hasFile('image')) {
                if ($project->image) {
                    Storage::disk('public')->delete('projects/' . $project->image);
                }
                $imageName = hash('sha256', $request->file('image')->getClientOriginalName() . time())
                    . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->storeAs('projects', $imageName, 'public');
            }

            $project->update([
                'project_category_id' => $request->project_category_id,
                'image' => $imageName,
                'is_active' => $request->has('is_active') ? 1 : 0,
                'order' => (int) $request->order,
            ]);

            $translation = $project->project_translation('tr');
            if ($translation) {
                $translation->update([
                    'title' => $request->title,
                    'slug' => Str::slug($request->title),
                    'content' => $request->content,
                    'meta_keywords' => $request->meta_keywords,
                    'meta_description' => $request->meta_description,
                ]);
            } else {
                $project->project_translations()->create([
                    'language_code' => 'tr',
                    'title' => $request->title,
                    'slug' => Str::slug($request->title),
                    'content' => $request->content,
                    'meta_keywords' => $request->meta_keywords,
                    'meta_description' => $request->meta_description,
                ]);
            }

            if ($request->hasFile('photos')) {
                $maxOrder = $project->images()->max('order') ?? -1;
                foreach ($request->file('photos') as $index => $photo) {
                    $photoName = hash('sha256', $photo->getClientOriginalName() . time() . $index)
                        . '.' . $photo->getClientOriginalExtension();
                    $photo->storeAs('project-images', $photoName, 'public');

                    $project->images()->create([
                        'image' => $photoName,
                        'order' => $maxOrder + $index + 1,
                    ]);
                }
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Proje güncellenirken bir hata oluştu: ' . $e->getMessage()]);
        }

        return redirect()->route('project')->with('success', 'Proje Başarıyla Güncellendi');
    }

    public function destroy($id)
    {
        $project = Project::with('images')->findOrFail($id);

        if ($project->image) {
            Storage::disk('public')->delete('projects/' . $project->image);
        }

        foreach ($project->images as $image) {
            Storage::disk('public')->delete('project-images/' . $image->image);
        }

        $project->delete();

        return redirect()->route('project')->with('success', 'Proje Başarıyla Silindi');
    }

    public function destroyImage($id)
    {
        $image = ProjectImage::findOrFail($id);

        Storage::disk('public')->delete('project-images/' . $image->image);
        $image->delete();

        return response()->json(['success' => true, 'message' => 'Fotoğraf başarıyla silindi.']);
    }
}
