<?php

namespace App\Http\Controllers\Admin\Suggestion;

use App\Http\Controllers\Controller;
use App\Models\Suggestion;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SuggestionController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $suggestions = Suggestion::query()->orderBy('created_at', 'desc')->orderBy('is_read', 'asc');

            return datatables()->eloquent($suggestions)

                ->addColumn('actions', function ($suggestion) {

                    $deleteUrl = route('suggestion.destroy', $suggestion->id);

                    return '
                    <button data-id="' . $suggestion->id . '" class="btn btn-primary btn-sm btn-read">Oku</button>
                    <form action="' . $deleteUrl . '" method="POST" style="display:inline-block;">
                    ' . csrf_field() . '
                    ' . method_field('DELETE') . '
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Bu kaydı silmek istediğinize emin misiniz?\')">Sil</button>
                </form>';
                })->rawColumns(['actions'])->make(true);
        }

        return view('panel.suggestion.index');
    }

    public function read($id)
    {
        $suggestion = Suggestion::findOrFail($id);
        $suggestion->is_read = true;
        $suggestion->save();

        return response()->json(['status' => true]);
    }

    public function show($id)
    {
        return Suggestion::findOrFail($id);
    }
    public function destroy($id)
    {
        $suggestion = Suggestion::findOrFail($id);
        $suggestion->delete();

        return redirect()->route('suggestion')->with('success', 'Talep Başarıyla Silindi');
    }
}
