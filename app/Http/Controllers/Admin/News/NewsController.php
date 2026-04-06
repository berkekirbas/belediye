<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsCreateRequest;
use App\Http\Requests\Admin\NewsUpdateRequest;
use App\Models\News;
use App\Models\NewsImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $news = News::with('news_translations')->orderBy('order')->get();

            $rows = $news->map(function ($item) {
                $translation = $item->news_translation('tr');
                $editUrl = route('news.edit', $item->id);
                $deleteUrl = route('news.destroy', $item->id);

                $imageHtml = $item->image
                    ? '<span
                        class="badge bg-success preview-image-btn"
                        style="cursor:pointer"
                        data-image="' . e($item->image_url) . '">
                        Resmi Gör
                    </span>'
                    : '<span class="badge bg-danger">Resim Yok</span>';

                $statusBadge = $item->is_active
                    ? '<span class="badge bg-success">Aktif</span>'
                    : '<span class="badge bg-danger">Pasif</span>';

                $headlineBadge = $item->is_headline
                    ? '<span class="badge bg-primary">Evet</span>'
                    : '<span class="badge bg-secondary">Hayır</span>';

                $homepageBadge = $item->is_homepage
                    ? '<span class="badge bg-primary">Evet</span>'
                    : '<span class="badge bg-secondary">Hayır</span>';

                $actions = '
                    <a href="' . $editUrl . '" class="btn btn-warning btn-sm">Düzenle</a>
                    <form action="' . $deleteUrl . '" method="POST" style="display:inline-block;">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Bu haberi silmek istediğinize emin misiniz?\')">Sil</button>
                    </form>';

                return [
                    'order' => $item->order,
                    'title' => $translation ? e($translation->title) : '-',
                    'image' => $imageHtml,
                    'status' => $statusBadge,
                    'is_headline' => $headlineBadge,
                    'is_homepage' => $homepageBadge,
                    'actions' => $actions,
                ];
            });

            return datatables()->collection($rows)
                ->rawColumns(['image', 'status', 'is_headline', 'is_homepage', 'actions'])
                ->make(true);
        }

        return view('panel.news.index');
    }

    public function add()
    {
        return view('panel.news.add');
    }

    public function store(NewsCreateRequest $request)
    {
        try {
            $imageName = null;
            if ($request->hasFile('image')) {
                $imageName = hash('sha256', $request->file('image')->getClientOriginalName() . time())
                    . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->storeAs('news', $imageName, 'public');
            }

            $news = News::create([
                'image' => $imageName,
                'is_active' => $request->has('is_active') ? 1 : 0,
                'is_headline' => $request->has('is_headline') ? 1 : 0,
                'is_homepage' => $request->has('is_homepage') ? 1 : 0,
                'order' => (int) $request->order,
            ]);

            $news->news_translations()->create([
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
                    $photo->storeAs('news-images', $photoName, 'public');

                    $news->images()->create([
                        'image' => $photoName,
                        'order' => $index,
                    ]);
                }
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Haber oluşturulurken bir hata oluştu: ' . $e->getMessage()]);
        }

        return redirect()->route('news')->with('success', 'Haber Başarıyla Eklendi');
    }

    public function edit($id)
    {
        $news = News::with(['news_translations', 'images'])->findOrFail($id);
        $translation = $news->news_translation('tr');

        return view('panel.news.edit', compact('news', 'translation'));
    }

    public function update(NewsUpdateRequest $request, $id)
    {
        $news = News::findOrFail($id);

        try {
            $imageName = $news->image;
            if ($request->hasFile('image')) {
                if ($news->image) {
                    Storage::disk('public')->delete('news/' . $news->image);
                }
                $imageName = hash('sha256', $request->file('image')->getClientOriginalName() . time())
                    . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->storeAs('news', $imageName, 'public');
            }

            $news->update([
                'image' => $imageName,
                'is_active' => $request->has('is_active') ? 1 : 0,
                'is_headline' => $request->has('is_headline') ? 1 : 0,
                'is_homepage' => $request->has('is_homepage') ? 1 : 0,
                'order' => (int) $request->order,
            ]);

            $translation = $news->news_translation('tr');
            if ($translation) {
                $translation->update([
                    'title' => $request->title,
                    'slug' => Str::slug($request->title),
                    'content' => $request->content,
                    'meta_keywords' => $request->meta_keywords,
                    'meta_description' => $request->meta_description,
                ]);
            } else {
                $news->news_translations()->create([
                    'language_code' => 'tr',
                    'title' => $request->title,
                    'slug' => Str::slug($request->title),
                    'content' => $request->content,
                    'meta_keywords' => $request->meta_keywords,
                    'meta_description' => $request->meta_description,
                ]);
            }

            if ($request->hasFile('photos')) {
                $maxOrder = $news->images()->max('order') ?? -1;
                foreach ($request->file('photos') as $index => $photo) {
                    $photoName = hash('sha256', $photo->getClientOriginalName() . time() . $index)
                        . '.' . $photo->getClientOriginalExtension();
                    $photo->storeAs('news-images', $photoName, 'public');

                    $news->images()->create([
                        'image' => $photoName,
                        'order' => $maxOrder + $index + 1,
                    ]);
                }
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Haber güncellenirken bir hata oluştu: ' . $e->getMessage()]);
        }

        return redirect()->route('news')->with('success', 'Haber Başarıyla Güncellendi');
    }

    public function destroy($id)
    {
        $news = News::with('images')->findOrFail($id);

        if ($news->image) {
            Storage::disk('public')->delete('news/' . $news->image);
        }

        foreach ($news->images as $image) {
            Storage::disk('public')->delete('news-images/' . $image->image);
        }

        $news->delete();

        return redirect()->route('news')->with('success', 'Haber Başarıyla Silindi');
    }

    public function destroyImage($id)
    {
        $image = NewsImage::findOrFail($id);

        Storage::disk('public')->delete('news-images/' . $image->image);
        $image->delete();

        return response()->json(['success' => true, 'message' => 'Fotoğraf başarıyla silindi.']);
    }
}
