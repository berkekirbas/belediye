<?php

namespace App\Http\Controllers\Admin\Module;

use App\Http\Controllers\Controller;
use App\Models\Module;
use Illuminate\Http\Request;


class ModuleController extends Controller
{
    public function index()
    {
        $module = Module::first();
        return view('panel.module.index', compact('module'));
    }

    public function update(Request $request)
    {
        $module = Module::first();

        try {
            $module->update([
                'activity_status'=> $request->has('activity_status') ? 1 : 0,
                'notice_status'=> $request->has('notice_status') ? 1 : 0,
                'project_status'=> $request->has('project_status') ? 1 : 0,
                'baskan_status'=> $request->has('baskan_status') ? 1 : 0,
                'baskanmessage_status'=> $request->has('baskanmessage_status') ? 1 : 0,
                'photo_status'=> $request->has('photo_status') ? 1 : 0,
                'contactform_status'=> $request->has('contactform_status') ? 1 : 0,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Modüller güncellenirken bir hata oluştu: ' . $e->getMessage()]);
        }

        return redirect()->route('module')->with('success', 'Modüller Başarıyla Güncellendi');
    }
}
