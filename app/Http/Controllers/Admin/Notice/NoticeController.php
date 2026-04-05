<?php

namespace App\Http\Controllers\Admin\Notice;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NoticeCreateRequest;
use App\Http\Requests\Admin\NoticeUpdateRequest;
use App\Models\Notice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class NoticeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $notices = Notice::with('notice_translations')->orderBy('order')->get();

            $rows = $notices->map(function ($notice) {
                $translation = $notice->notice_translation('tr');
                $editUrl = route('notice.edit', $notice->id);
                $deleteUrl = route('notice.destroy', $notice->id);

                $imageHtml = $notice->image
                    ? '<span
                        class="badge bg-success preview-image-btn"
                        style="cursor:pointer"
                        data-image="' . e($notice->image_url) . '">
                        Resmi Gör
                    </span>'
                    :
                    '<span class="badge bg-danger">
                         Resim Yok
                    </span>';

                $statusBadge = $notice->is_active
                    ? '<span class="badge bg-success">Aktif</span>'
                    : '<span class="badge bg-danger">Pasif</span>';

                $actions = '
                    <a href="' . $editUrl . '" class="btn btn-warning btn-sm">Düzenle</a>
                    <form action="' . $deleteUrl . '" method="POST" style="display:inline-block;">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Bu duyuruyu silmek istediğinize emin misiniz?\')">Sil</button>
                    </form>';

                return [
                    'image' => $imageHtml,
                    'title' => $translation ? e($translation->title) : '-',
                    'status' => $statusBadge,
                    'order' => $notice->order,
                    'actions' => $actions,
                ];
            });

            return datatables()->collection($rows)
                ->rawColumns(['image', 'status', 'actions'])
                ->make(true);
        }

        return view('panel.notice.index');
    }

    public function add()
    {
        return view('panel.notice.add');
    }

    public function store(NoticeCreateRequest $request)
    {
        try {
            $imageName = null;
            if ($request->hasFile('image')) {
                $imageName = hash('sha256', $request->file('image')->getClientOriginalName() . time())
                    . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->storeAs('notice', $imageName, 'public');
            }

            $notice = Notice::create([
                'image' => $imageName,
                'is_active' => $request->has('is_active') ? 1 : 0,
                'order' => (int) $request->order,
            ]);

            $notice->notice_translations()->create([
                'language_code' => 'tr',
                'title' => $request->title,
                'content' => $request->content,
                'meta_keywords' => $request->meta_keywords,
                'meta_description' => $request->meta_description,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Duyuru oluşturulurken bir hata oluştu: ' . $e->getMessage()]);
        }

        return redirect()->route('notice')->with('success', 'Duyuru Başarıyla Eklendi');
    }

    public function edit($id)
    {
        $notice = Notice::with('notice_translations')->findOrFail($id);
        $translation = $notice->notice_translation('tr');

        return view('panel.notice.edit', compact('notice', 'translation'));
    }

    public function update(NoticeUpdateRequest $request, $id)
    {
        $notice = Notice::findOrFail($id);

        try {
            $imageName = $notice->image;
            if ($request->hasFile('image')) {
                if ($notice->image) {
                    Storage::delete('notice/' . $notice->image, 'public');
                }
                $imageName = hash('sha256', $request->file('image')->getClientOriginalName() . time())
                    . '.' . $request->file('image')->getClientOriginalExtension();
                $request->file('image')->storeAs('notice', $imageName, 'public');
            }

            $notice->update([
                'image' => $imageName,
                'is_active' => $request->has('is_active') ? 1 : 0,
                'order' => (int) $request->order,
            ]);

            $translation = $notice->notice_translation('tr');
            if ($translation) {
                $translation->update([
                    'title' => $request->title,
                    'content' => $request->content,
                    'meta_keywords' => $request->meta_keywords,
                    'meta_description' => $request->meta_description,
                ]);
            } else {
                $notice->notice_translations()->create([
                    'language_code' => 'tr',
                    'title' => $request->title,
                    'content' => $request->content,
                    'meta_keywords' => $request->meta_keywords,
                    'meta_description' => $request->meta_description,
                ]);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Duyuru güncellenirken bir hata oluştu: ' . $e->getMessage()]);
        }

        return redirect()->route('notice')->with('success', 'Duyuru Başarıyla Güncellendi');
    }

    public function destroy($id)
    {
        $notice = Notice::findOrFail($id);

        if ($notice->image) {
            Storage::delete('notice/' . $notice->image, 'public');
        }

        $notice->delete();

        return redirect()->route('notice')->with('success', 'Duyuru Başarıyla Silindi');
    }
}
