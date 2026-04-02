<?php

namespace App\Http\Controllers\Admin\Theme;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ThemeUpdateRequest;
use App\Models\Theme;
use Illuminate\Http\Request;


class ThemeController extends Controller
{
    public function index()
    {
        $id=1;
        $theme = Theme::findOrFail($id);
        return view('panel.theme.index', compact('theme'));
    }

    public function update(ThemeUpdateRequest $request)
    {
        $id=1;
        $theme = Theme::findOrFail($id);

        try {
            $theme->update([
                'color1' => $request->color1,
                'color2' => $request->color2,
                'color3' => $request->color3
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Tema renkleri güncellenirken bir hata oluştu: ' . $e->getMessage()]);
        }

        return redirect()->route('theme')->with('success', 'Tema renkleri Başarıyla Güncellendi');
    }

}
