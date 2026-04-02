<?php

namespace App\Http\Controllers\Admin\Condolence;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CondolenceCreateRequest;
use App\Models\Condolence;
use Illuminate\Http\Request;


class CondolenceController extends Controller
{
    public function index(Request $request)
    {
       if ($request->ajax()) {

            $condolences = Condolence::query();

            return datatables()->eloquent($condolences)

                ->addColumn('actions', function ($condolence) {
                    $editUrl = route('condolence.edit', $condolence->id);
                    $deleteUrl = route('condolence.destroy', $condolence->id);

                    return '
                <a href="' . $editUrl . '" class="btn btn-warning btn-sm">Düzenle</a>
                <form action="' . $deleteUrl . '" method="POST" style="display:inline-block;">
                    ' . csrf_field() . '
                    ' . method_field('DELETE') . '
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Bu kaydı silmek istediğinize emin misiniz?\')">Sil</button>
                </form>';
                })->rawColumns(['actions'])->make(true);
        }

        return view('panel.condolence.index');
    }


    public function add()
    {

        return view('panel.condolence.add');
    }

    public function store(CondolenceCreateRequest $request)
    {
        try {
            Condolence::create([
                'fullname' => $request->fullname,
                'job' => $request->job,
                'is_active' => $request->has('is_active') ? 1 : 0,
                'message' => $request->message
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Taziye Başsağlığı oluşturulurken bir hata oluştu: ' . $e->getMessage()]);
        }

        return redirect()->route('condolence')->with('success', 'Taziye Başsağlığı Başarıyla Eklendi');

    }

    public function edit($id)
    {
        $condolence = Condolence::findOrFail($id);
        return view('panel.condolence.edit', compact('condolence'));
    }

    public function update(CondolenceCreateRequest $request, $id)
    {
        $condolence = Condolence::findOrFail($id);

        try {
            $condolence->update([
                'fullname' => $request->fullname,
                'job' => $request->job,
                'is_active' => $request->has('is_active') ? 1 : 0,
                'message' => $request->message
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Taziye Başsağlığı güncellenirken bir hata oluştu: ' . $e->getMessage()]);
        }

        return redirect()->route('condolence')->with('success', 'Taziye Başsağlığı Başarıyla Güncellendi');
    }

    public function destroy($id)
    {
        $condolence = Condolence::findOrFail($id);
        $condolence->delete();

        return redirect()->route('condolence')->with('success', 'Taziye Başsağlığı Başarıyla Silindi');
    }

}
