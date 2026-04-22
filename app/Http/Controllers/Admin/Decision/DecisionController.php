<?php

namespace App\Http\Controllers\Admin\Decision;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DecisionCreateRequest;
use App\Models\Decision;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DecisionController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $decisions = Decision::query()->get();

            $rows = $decisions->map(function ($decision) {

                $editUrl = route('decision.edit', $decision->id);
                $deleteUrl = route('decision.destroy', $decision->id);

                $fileHtml = $decision->file_url
                    ? '<a href="' . e($decision->file_url) . '" target="_blank" class="badge bg-success">Dosyayı Gör</a>'
                    : '<span class="badge bg-danger">Dosya Yok</span>';


                $statusBadge = $decision->is_active
                    ? '<span class="badge bg-success">Aktif</span>'
                    : '<span class="badge bg-danger">Pasif</span>';

                $actions = '
                    <a href="' . $editUrl . '" class="btn btn-warning btn-sm">Düzenle</a>
                    <form action="' . $deleteUrl . '" method="POST" style="display:inline-block;">
                        ' . csrf_field() . '
                        ' . method_field('DELETE') . '
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Bu Kararı silmek istediğinize emin misiniz?\')">Sil</button>
                    </form>';

                return [
                    'file' => $fileHtml,
                    'title' => $decision->title,
                    'status' => $statusBadge,
                    'month' => $decision->month,
                    'year' => $decision->year,
                    'actions' => $actions,
                ];
            });

            return datatables()->collection($rows)
                ->rawColumns(['file', 'status', 'actions'])
                ->make(true);
        }

        return view('panel.decision.index');
    }

    public function add()
    {
        return view('panel.decision.add');
    }

    public function store(DecisionCreateRequest $request)
    {
        try {
            $filename = null;
            if ($request->hasFile('filename')) {
                $filename = hash('sha256', $request->file('filename')->getClientOriginalName() . time())
                    . '.' . $request->file('filename')->getClientOriginalExtension();
                $request->file('filename')->storeAs('decision', $filename, 'public');
            }

            $decision = Decision::create([
                'filename' => $filename,
                'title' => $request->title,
                'is_active' => $request->has('is_active') ? 1 : 0,
                'month' => (int) $request->month,
                'year' => (int) $request->year,
            ]);

        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Meclis kararı oluşturulurken bir hata oluştu: ' . $e->getMessage()]);
        }

        return redirect()->route('decision')->with('success', 'Meclis kararı Başarıyla Eklendi');
    }

    public function edit($id)
    {
        $decision = Decision::findOrFail($id);

        return view('panel.decision.edit', compact('decision'));
    }

    public function update(Request $request, $id)
    {
        $decision = Decision::findOrFail($id);

        try {
            $filename = $decision->filename;
            if ($request->hasFile('filename')) {
                if ($decision->filename) {
                    Storage::delete('decision/' . $decision->filename, 'public');
                }
                $filename = hash('sha256', $request->file('filename')->getClientOriginalName() . time())
                    . '.' . $request->file('filename')->getClientOriginalExtension();
                $request->file('filename')->storeAs('decision', $filename, 'public');
            }

            $decision->update([
                'filename' => $filename,
                'title' => $request->title,
                'month' => (int) $request->month,
                'year' => (int) $request->year,
                'is_active' => $request->has('is_active') ? 1 : 0,
            ]);


        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Meclis kararı güncellenirken bir hata oluştu: ' . $e->getMessage()]);
        }

        return redirect()->route('decision')->with('success', 'Meclis kararı Başarıyla Güncellendi');
    }

    public function destroy($id)
    {
        $decision = Decision::findOrFail($id);

        if ($decision->filename) {
            Storage::delete('decision/' . $decision->filename, 'public');
        }

        $decision->delete();

        return redirect()->route('decision')->with('success', 'Meclis kararı Başarıyla Silindi');
    }
}
