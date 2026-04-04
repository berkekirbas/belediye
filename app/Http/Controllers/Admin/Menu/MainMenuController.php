<?php

namespace App\Http\Controllers\Admin\Menu;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MenuCreateRequest;
use App\Models\MainMenu;
use App\Models\Page;
use Illuminate\Http\Request;


class MainMenuController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $menus = MainMenu::whereNull('parent_id')
                ->with('allChildren')
                ->orderBy('order')
                ->get();

            $rows = [];
            $this->buildFlatRows($menus, $rows);

            return datatables()->collection(collect($rows))
                ->rawColumns(['name', 'actions'])
                ->make(true);
        }

        return view('panel.menu.index');
    }

    private function buildFlatRows($menus, array &$rows, int $level = 0): void
    {
        foreach ($menus as $menu) {
            $rows[] = $this->formatMenuRow($menu, $level);
            if ($menu->allChildren->isNotEmpty()) {
                $this->buildFlatRows($menu->allChildren, $rows, $level + 1);
            }
        }
    }

    private function formatMenuRow(MainMenu $menu, int $level): array
    {
        $editUrl = route('mainmenu.edit', $menu->id);
        $deleteUrl = route('mainmenu.destroy', $menu->id);

        if ($level > 0) {
            $name = '<span style="padding-left: ' . ($level * 30) . 'px; color: #6c757d;">└─ ' . e($menu->name) . '</span>';
        } else {
            $name = '<strong>' . e($menu->name) . '</strong>';
        }

        $actions = '
            <a href="' . $editUrl . '" class="btn btn-warning btn-sm">Düzenle</a>
            <form action="' . $deleteUrl . '" method="POST" style="display:inline-block;">
                ' . csrf_field() . '
                ' . method_field('DELETE') . '
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Bu menüyü silmek istediğinize emin misiniz?\')">Sil</button>
            </form>';

        return [
            'name' => $name,
            'url' => $menu->url,
            'order' => $menu->order,
            'actions' => $actions,
        ];
    }

    private function buildMenuTree($menus, int $level = 0, ?int $excludeId = null): array
    {
        $result = [];
        foreach ($menus as $menu) {
            if ($excludeId && $menu->id === $excludeId) {
                continue;
            }
            $result[] = [
                'id' => $menu->id,
                'name' => $menu->name,
                'level' => $level,
            ];
            if ($menu->allChildren->isNotEmpty()) {
                $result = array_merge($result, $this->buildMenuTree($menu->allChildren, $level + 1, $excludeId));
            }
        }
        return $result;
    }

    public function add()
    {
        $menus = MainMenu::whereNull('parent_id')
            ->with('allChildren')
            ->orderBy('order')
            ->get();
        $menuTree = $this->buildMenuTree($menus);
        $pages = Page::with('translations')->where('is_active', true)->orderBy('order')->get();
        return view('panel.menu.add', compact('menuTree', 'pages'));
    }

    public function store(MenuCreateRequest $request)
    {
        try {
            MainMenu::create([
                'name' => $request->name,
                'url' => $request->url,
                'order' => (int)$request->order,
                'parent_id' => (int) $request->parent_id == -1 ? null : (int) $request->parent_id,
                'open_type' => $request->open_type,
                'is_active' => $request->has('is_active') ? 1 : 0,
                'page_id' => $request->page_id ?: null,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Menü oluşturulurken bir hata oluştu: ' . $e->getMessage()]);
        }

        return redirect()->route('mainmenu')->with('success', 'Menü Başarıyla Eklendi');
    }

    public function edit($id)
    {
        $menu = MainMenu::findOrFail($id);
        $menus = MainMenu::whereNull('parent_id')
            ->with('allChildren')
            ->orderBy('order')
            ->get();
        $menuTree = $this->buildMenuTree($menus, 0, $menu->id);
        $pages = Page::with('translations')->where('is_active', true)->orderBy('order')->get();
        return view('panel.menu.edit', compact('menu', 'menuTree', 'pages'));
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
                'is_active' => $request->has('is_active') ? 1 : 0,
                'page_id' => $request->page_id ?: null,
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
