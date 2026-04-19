<?php

namespace App\Http\Controllers\Admin\Message;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $messages = Message::query()->orderBy('created_at', 'desc')->orderBy('is_read', 'asc');

            return datatables()->eloquent($messages)

                ->addColumn('actions', function ($message) {

                    $deleteUrl = route('message.destroy', $message->id);

                    return '
                    <button data-id="' . $message->id . '" class="btn btn-primary btn-sm btn-read">Oku</button>
                    <form action="' . $deleteUrl . '" method="POST" style="display:inline-block;">
                    ' . csrf_field() . '
                    ' . method_field('DELETE') . '
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Bu kaydı silmek istediğinize emin misiniz?\')">Sil</button>
                </form>';
                })->rawColumns(['actions'])->make(true);
        }

        return view('panel.message.index');
    }

    public function read($id)
    {
        $message = Message::findOrFail($id);
        $message->is_read = true;
        $message->save();

        return response()->json(['status' => true]);
    }

    public function show($id)
    {
        return Message::findOrFail($id);
    }
    public function destroy($id)
    {
        $mesaj = Message::findOrFail($id);
        $mesaj->delete();

        return redirect()->route('message')->with('success', 'Mesaj Başarıyla Silindi');
    }
}
