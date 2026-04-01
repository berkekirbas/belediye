<?php

namespace App\Http\Controllers\Admin\Menu;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MenuCreateRequest;
use App\Models\MainMenu;
use Illuminate\Http\Request;


class MainMenuController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $menus = MainMenu::query();

            return datatables()->eloquent($menus)
                ->addColumn('actions', function ($menu) {
                    $editUrl = route('mainmenu.edit', $menu->id);
                    $deleteUrl = route('mainmenu.destroy', $menu->id);

                    return '
                <a href="' . $editUrl . '" class="btn btn-warning btn-sm">Düzenle</a>
                <form action="' . $deleteUrl . '" method="POST" style="display:inline-block;">
                    ' . csrf_field() . '
                    ' . method_field('DELETE') . '
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Bu menüyü silmek istediğinize emin misiniz?\')">Sil</button>
                </form>';
                })->rawColumns(['actions'])->make(true);
        }

        return view('panel.menu.index');
    }

    public function add()
    {
        return view('panel.menu.add');
    }

    public function store(MenuCreateRequest $request)
    {
        try {
            MainMenu::create([
                'name' => $request->name,
                'url' => $request->url,
                'order' => (int)$request->order,
                'open_type' => $request->open_type,
                'is_active' => $request->has('is_active') ? 1 : 0
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Menü oluşturulurken bir hata oluştu: ' . $e->getMessage()]);
        }

        return redirect()->route('mainmenu')->with('success', 'Menü Başarıyla Eklendi');
    }

    public function edit($id)
    {
        $menu = MainMenu::findOrFail($id);
        return view('panel.menu.edit', compact('menu'));
    }

    public function update(MenuCreateRequest $request, $id)
    {
        $menu = MainMenu::findOrFail($id);

        try {
            $menu->update([
                'name' => $request->name,
                'url' => $request->url,
                'order' => (int)$request->order,
                'open_type' => $request->open_type,
                'is_active' => $request->has('is_active') ? 1 : 0
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Menü güncellenirken bir hata oluştu: ' . $e->getMessage()]);
        }

        return redirect()->route('mainmenu')->with('success', 'Menü Başarıyla Güncellendi');
    }

    public function destroy($id)
    {
        $menu = MainMenu::findOrFail($id);
        $menu->delete();

        return redirect()->route('mainmenu')->with('success', 'Menü Başarıyla Silindi');
    }
}
