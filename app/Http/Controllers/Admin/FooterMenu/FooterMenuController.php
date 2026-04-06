<?php

namespace App\Http\Controllers\Admin\FooterMenu;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FooterMenuCreateRequest;
use App\Models\FooterMenu;
use App\Models\Page;
use Illuminate\Http\Request;


class FooterMenuController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $menus = FooterMenu::whereNull('parent_id')
                ->with('allChildren')
                ->orderBy('order')
                ->get();

            $rows = [];
            $this->buildFlatRows($menus, $rows);

            return datatables()->collection(collect($rows))
                ->rawColumns(['name', 'actions'])
                ->make(true);
        }

        return view('panel.footermenu.index');
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

    private function formatMenuRow(FooterMenu $menu, int $level): array
    {
        $editUrl = route('footermenu.edit', $menu->id);
        $deleteUrl = route('footermenu.destroy', $menu->id);

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
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Bu footer menüyü silmek istediğinize emin misiniz?\')">Sil</button>
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
        $menus = FooterMenu::whereNull('parent_id')
            ->with('allChildren')
            ->orderBy('order')
            ->get();
        $menuTree = $this->buildMenuTree($menus);
        $pages = Page::with('translations')->where('is_active', true)->orderBy('order')->get();
        return view('panel.footermenu.add', compact('menuTree', 'pages'));
    }

    public function store(FooterMenuCreateRequest $request)
    {
        try {
            FooterMenu::create([
                'name' => $request->name,
                'url' => $request->url,
                'order' => (int)$request->order,
                'parent_id' => (int) $request->parent_id == -1 ? null : (int) $request->parent_id,
                'open_type' => $request->open_type,
                'is_active' => $request->has('is_active') ? 1 : 0,
                'page_id' => $request->page_id ?: null,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Footer Menü oluşturulurken bir hata oluştu: ' . $e->getMessage()]);
        }

        return redirect()->route('footermenu')->with('success', 'Footer Menü Başarıyla Eklendi');
    }

    public function edit($id)
    {
        $menu = FooterMenu::findOrFail($id);
        $menus = FooterMenu::whereNull('parent_id')
            ->with('allChildren')
            ->orderBy('order')
            ->get();
        $menuTree = $this->buildMenuTree($menus, 0, $menu->id);
        $pages = Page::with('translations')->where('is_active', true)->orderBy('order')->get();
        return view('panel.footermenu.edit', compact('menu', 'menuTree', 'pages'));
    }

    public function update(FooterMenuCreateRequest $request, $id)
    {
        $menu = FooterMenu::findOrFail($id);

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
            return redirect()->back()->withInput()->withErrors(['error' => 'Footer Menü güncellenirken bir hata oluştu: ' . $e->getMessage()]);
        }

        return redirect()->route('footermenu')->with('success', 'Footer Menü Başarıyla Güncellendi');
    }

    public function destroy($id)
    {
        $menu = FooterMenu::findOrFail($id);
        $menu->delete();

        return redirect()->route('footermenu')->with('success', 'Footer Menü Başarıyla Silindi');
    }
}
