<?php

namespace App\Http\Controllers\Admin\PhotoGallery;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PhotoGalleryCreateRequest;
use App\Http\Requests\Admin\PhotoGalleryUpdateRequest;
use App\Models\PhotoGallery;
use App\Models\PhotoGalleryImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PhotoGalleryController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $galleries = PhotoGallery::with('photo_gallery_translations')->orderBy('order')->get();

            $rows = $galleries->map(function ($gallery) {
                $translation = $gallery->photo_gallery_translation('tr');
                $editUrl = route('photo.edit', $gallery->id);
                $deleteUrl = route('photo.destroy', $gallery->id);

                $imageHtml = $gallery->image
                    ? '<span
                        class="badge bg-success preview-image-btn"
                        style="cursor:pointer"
                        data-image="' . e($gallery->image_url) . '">
                        Resmi Gör
                    </span>'
                    : '<span class="badge bg-danger">Resim Yok</span>';

                $statusBadge = $gallery->is_active
                    ? '<span class="badge bg-success">Aktif</span>'
                    : '<span class="badge bg-danger">Pasif</span>';

                $photoCount = $gallery->images()->count();

                $actions = '
                    <a href="' . $editUrl . '" class="btn btn-warning btn-sm">Düzenle</a>
                    <form action="' . $deleteUrl . '" method="POST" style="display:inline-block;">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Bu albümü silmek istediğinize emin misiniz?\')">Sil</button>
                    </form>';

                return [
                    'image' => $imageHtml,
                    'title' => $translation ? e($translation->title) : '-',
                    'photo_count' => $photoCount . ' Fotoğraf',
                    'status' => $statusBadge,
                    'order' => $gallery->order,
                    'actions' => $actions,
                ];
            });

            return datatables()->collection($rows)
                ->rawColumns(['image', 'status', 'actions'])
                ->make(true);
        }

        return view('panel.photo.index');
    }

    public function add()
    {
        return view('panel.photo.add');
    }

    public function store(PhotoGalleryCreateRequest $request)
    {
        try {
            $imageName = null;
            if ($request->hasFile('image')) {
                $imageName = hash('sha256', $request->file('image')->getClientOriginalName() . time())
                    . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->storeAs('photo-galleries', $imageName, 'public');
            }

            $gallery = PhotoGallery::create([
                'image' => $imageName,
                'is_active' => $request->has('is_active') ? 1 : 0,
                'order' => (int) $request->order,
            ]);

            $gallery->photo_gallery_translations()->create([
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
                    $photo->storeAs('photo-gallery-images', $photoName, 'public');

                    $gallery->images()->create([
                        'image' => $photoName,
                        'order' => $index,
                    ]);
                }
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Albüm oluşturulurken bir hata oluştu: ' . $e->getMessage()]);
        }

        return redirect()->route('photo')->with('success', 'Albüm Başarıyla Eklendi');
    }

    public function edit($id)
    {
        $gallery = PhotoGallery::with(['photo_gallery_translations', 'images'])->findOrFail($id);
        $translation = $gallery->photo_gallery_translation('tr');

        return view('panel.photo.edit', compact('gallery', 'translation'));
    }

    public function update(PhotoGalleryUpdateRequest $request, $id)
    {
        $gallery = PhotoGallery::findOrFail($id);

        try {
            $imageName = $gallery->image;
            if ($request->hasFile('image')) {
                if ($gallery->image) {
                    Storage::disk('public')->delete('photo-galleries/' . $gallery->image);
                }
                $imageName = hash('sha256', $request->file('image')->getClientOriginalName() . time())
                    . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->storeAs('photo-galleries', $imageName, 'public');
            }

            $gallery->update([
                'image' => $imageName,
                'is_active' => $request->has('is_active') ? 1 : 0,
                'order' => (int) $request->order,
            ]);

            $translation = $gallery->photo_gallery_translation('tr');
            if ($translation) {
                $translation->update([
                    'title' => $request->title,
                    'slug' => Str::slug($request->title),
                    'content' => $request->content,
                    'meta_keywords' => $request->meta_keywords,
                    'meta_description' => $request->meta_description,
                ]);
            } else {
                $gallery->photo_gallery_translations()->create([
                    'language_code' => 'tr',
                    'title' => $request->title,
                    'slug' => Str::slug($request->title),
                    'content' => $request->content,
                    'meta_keywords' => $request->meta_keywords,
                    'meta_description' => $request->meta_description,
                ]);
            }

            if ($request->hasFile('photos')) {
                $maxOrder = $gallery->images()->max('order') ?? -1;
                foreach ($request->file('photos') as $index => $photo) {
                    $photoName = hash('sha256', $photo->getClientOriginalName() . time() . $index)
                        . '.' . $photo->getClientOriginalExtension();
                    $photo->storeAs('photo-gallery-images', $photoName, 'public');

                    $gallery->images()->create([
                        'image' => $photoName,
                        'order' => $maxOrder + $index + 1,
                    ]);
                }
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Albüm güncellenirken bir hata oluştu: ' . $e->getMessage()]);
        }

        return redirect()->route('photo')->with('success', 'Albüm Başarıyla Güncellendi');
    }

    public function destroy($id)
    {
        $gallery = PhotoGallery::with('images')->findOrFail($id);

        if ($gallery->image) {
            Storage::disk('public')->delete('photo-galleries/' . $gallery->image);
        }

        foreach ($gallery->images as $image) {
            Storage::disk('public')->delete('photo-gallery-images/' . $image->image);
        }

        $gallery->delete();

        return redirect()->route('photo')->with('success', 'Albüm Başarıyla Silindi');
    }

    public function destroyImage($id)
    {
        $image = PhotoGalleryImage::findOrFail($id);

        Storage::disk('public')->delete('photo-gallery-images/' . $image->image);
        $image->delete();

        return response()->json(['success' => true, 'message' => 'Fotoğraf başarıyla silindi.']);
    }
}
