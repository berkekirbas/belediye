<?php

namespace App\Http\Controllers\Admin\Page;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PageCreateRequest;
use App\Http\Requests\Admin\PageUpdateRequest;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $pages = Page::with('translations')->orderBy('order')->get();

            $rows = $pages->map(function ($page) {
                $translation = $page->translation('tr');
                $editUrl = route('pages.edit', $page->id);
                $deleteUrl = route('pages.destroy', $page->id);

                $imageHtml = $page->image
                    ? '<span
                        class="badge bg-success preview-image-btn"
                        style="cursor:pointer"
                        data-image="' . e($page->image_url) . '">
                        Resmi Gör
                    </span>'
                    :
                    '<span class="badge bg-danger">
                         Resim Yok
                    </span>';

                $statusBadge = $page->is_active
                    ? '<span class="badge bg-success">Aktif</span>'
                    : '<span class="badge bg-danger">Pasif</span>';

                $actions = '
                    <a href="' . $editUrl . '" class="btn btn-warning btn-sm">Düzenle</a>
                    <form action="' . $deleteUrl . '" method="POST" style="display:inline-block;">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Bu sayfayı silmek istediğinize emin misiniz?\')">Sil</button>
                    </form>';

                return [
                    'image' => $imageHtml,
                    'title' => $translation ? e($translation->title) : '-',
                    'slug' => $translation ? e($translation->slug) : '-',
                    'status' => $statusBadge,
                    'order' => $page->order,
                    'actions' => $actions,
                ];
            });

            return datatables()->collection($rows)
                ->rawColumns(['image', 'status', 'actions'])
                ->make(true);
        }

        return view('panel.pages.index');
    }

    public function add()
    {
        return view('panel.pages.add');
    }

    public function store(PageCreateRequest $request)
    {
        try {
            $imageName = null;
            if ($request->hasFile('image')) {
                $imageName = hash('sha256', $request->file('image')->getClientOriginalName() . time())
                    . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->storeAs('pages', $imageName, 'public');
            }

            $page = Page::create([
                'image' => $imageName,
                'is_active' => $request->has('is_active') ? 1 : 0,
                'order' => (int) $request->order,
            ]);

            $page->translations()->create([
                'language_code' => 'tr',
                'title' => $request->title,
                'slug' => Str::slug($request->slug),
                'content' => $request->content,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Sayfa oluşturulurken bir hata oluştu: ' . $e->getMessage()]);
        }

        return redirect()->route('pages')->with('success', 'Sayfa Başarıyla Eklendi');
    }

    public function edit($id)
    {
        $page = Page::with('translations')->findOrFail($id);
        $translation = $page->translation('tr');

        return view('panel.pages.edit', compact('page', 'translation'));
    }

    public function update(PageUpdateRequest $request, $id)
    {
        $page = Page::findOrFail($id);

        try {
            $imageName = $page->image;
            if ($request->hasFile('image')) {
                if ($page->image) {
                    Storage::delete('pages/' . $page->image, 'public');
                }
                $imageName = hash('sha256', $request->file('image')->getClientOriginalName() . time())
                    . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->storeAs('pages', $imageName, 'public');
            }

            $page->update([
                'image' => $imageName,
                'is_active' => $request->has('is_active') ? 1 : 0,
                'order' => (int) $request->order,
            ]);

            $translation = $page->translation('tr');
            if ($translation) {
                $translation->update([
                    'title' => $request->title,
                    'slug' => Str::slug($request->slug),
                    'content' => $request->content,
                    'meta_keywords' => $request->meta_keywords,
                    'meta_description' => $request->meta_description,
                ]);
            } else {
                $page->translations()->create([
                    'language_code' => 'tr',
                    'title' => $request->title,
                    'slug' => Str::slug($request->slug),
                    'content' => $request->content,
                    'meta_keywords' => $request->meta_keywords,
                    'meta_description' => $request->meta_description,
                ]);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Sayfa güncellenirken bir hata oluştu: ' . $e->getMessage()]);
        }

        return redirect()->route('pages')->with('success', 'Sayfa Başarıyla Güncellendi');
    }

    public function destroy($id)
    {
        $page = Page::findOrFail($id);

        if ($page->image) {
            Storage::delete('pages/' . $page->image, 'public');
        }

        $page->delete();

        return redirect()->route('pages')->with('success', 'Sayfa Başarıyla Silindi');
    }
}
