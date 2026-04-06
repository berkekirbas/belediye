<?php

namespace App\Http\Controllers\Admin\QuickMenu;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\QuickMenuCreateRequest;
use App\Models\QuickMenu;
use App\Models\Page;
use Illuminate\Http\Request;


class QuickMenuController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $menu = QuickMenu::query()->orderBy('order');

            return datatables()->eloquent($menu)

                ->addColumn('actions', function ($quickMenu) {
                    $editUrl = route('quickmenu.edit', $quickMenu->id);
                    $deleteUrl = route('quickmenu.destroy', $quickMenu->id);

                    return '
                <a href="' . $editUrl . '" class="btn btn-warning btn-sm">Düzenle</a>
                <form action="' . $deleteUrl . '" method="POST" style="display:inline-block;">
                    ' . csrf_field() . '
                    ' . method_field('DELETE') . '
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Bu Hızlı Menü kaydını silmek istediğinize emin misiniz?\')">Sil</button>
                </form>';
                })->rawColumns(['actions'])->make(true);
        }

        return view('panel.quickmenu.index');
    }

    public function add()
    {
        $pages = Page::with('translations')->where('is_active', true)->orderBy('order')->get();
        return view('panel.quickmenu.add', compact('pages'));
    }

    public function store(QuickMenuCreateRequest $request)
    {
        try {
            QuickMenu::create([
                'name' => $request->name,
                'url' => $request->url,
                'order' => (int)$request->order,
                'open_type' => $request->open_type,
                'is_active' => $request->has('is_active') ? 1 : 0,
                'page_id' => $request->page_id ?: null,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Hızlı Menü oluşturulurken bir hata oluştu: ' . $e->getMessage()]);
        }

        return redirect()->route('quickmenu')->with('success', 'Hızlı Menü Başarıyla Eklendi');
    }

    public function edit($id)
    {
        $menu = QuickMenu::findOrFail($id);

        $pages = Page::with('translations')->where('is_active', true)->orderBy('order')->get();
        return view('panel.quickmenu.edit', compact('menu', 'pages'));
    }

    public function update(QuickMenuCreateRequest $request, $id)
    {
        $menu = QuickMenu::findOrFail($id);

        try {
            $menu->update([
                'name' => $request->name,
                'url' => $request->url,
                'order' => (int)$request->order,
                'open_type' => $request->open_type,
                'is_active' => $request->has('is_active') ? 1 : 0,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Hızlı Menü güncellenirken bir hata oluştu: ' . $e->getMessage()]);
        }

        return redirect()->route('quickmenu')->with('success', 'Hızlı Menü Başarıyla Güncellendi');
    }

    public function destroy($id)
    {
        $menu = QuickMenu::findOrFail($id);
        $menu->delete();

        return redirect()->route('quickmenu')->with('success', 'Hızlı Menü Başarıyla Silindi');
    }
}
