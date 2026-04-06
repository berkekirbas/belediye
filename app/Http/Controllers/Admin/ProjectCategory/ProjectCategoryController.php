<?php

namespace App\Http\Controllers\Admin\ProjectCategory;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProjectCategoryCreateRequest;
use App\Http\Requests\Admin\ProjectCategoryUpdateRequest;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectCategoryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $categories = ProjectCategory::orderBy('order')->get();

            $rows = $categories->map(function ($category) {
                $editUrl = route('project-category.edit', $category->id);
                $deleteUrl = route('project-category.destroy', $category->id);

                $statusBadge = $category->is_active
                    ? '<span class="badge bg-success">Aktif</span>'
                    : '<span class="badge bg-danger">Pasif</span>';

                $actions = '
                    <a href="' . $editUrl . '" class="btn btn-warning btn-sm">Düzenle</a>
                    <form action="' . $deleteUrl . '" method="POST" style="display:inline-block;">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Bu kategoriyi silmek istediğinize emin misiniz?\')">Sil</button>
                    </form>';

                return [
                    'name' => e($category->name),
                    'slug' => e($category->slug),
                    'status' => $statusBadge,
                    'order' => $category->order,
                    'actions' => $actions,
                ];
            });

            return datatables()->collection($rows)
                ->rawColumns(['status', 'actions'])
                ->make(true);
        }

        return view('panel.project-category.index');
    }

    public function add()
    {
        return view('panel.project-category.add');
    }

    public function store(ProjectCategoryCreateRequest $request)
    {
        try {
            ProjectCategory::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'is_active' => $request->has('is_active') ? 1 : 0,
                'order' => (int) $request->order,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Proje kategorisi oluşturulurken bir hata oluştu: ' . $e->getMessage()]);
        }

        return redirect()->route('project-category')->with('success', 'Proje Kategorisi Başarıyla Eklendi');
    }

    public function edit($id)
    {
        $category = ProjectCategory::findOrFail($id);

        return view('panel.project-category.edit', compact('category'));
    }

    public function update(ProjectCategoryUpdateRequest $request, $id)
    {
        $category = ProjectCategory::findOrFail($id);

        try {
            $category->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
                'is_active' => $request->has('is_active') ? 1 : 0,
                'order' => (int) $request->order,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Proje kategorisi güncellenirken bir hata oluştu: ' . $e->getMessage()]);
        }

        return redirect()->route('project-category')->with('success', 'Proje Kategorisi Başarıyla Güncellendi');
    }

    public function destroy($id)
    {
        $category = ProjectCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('project-category')->with('success', 'Proje Kategorisi Başarıyla Silindi');
    }
}
