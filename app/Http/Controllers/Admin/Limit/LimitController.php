<?php

namespace App\Http\Controllers\Admin\Limit;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LimitUpdateRequest;
use App\Models\Limit;
use Illuminate\Http\Request;


class LimitController extends Controller
{
    public function index()
    {
        $limit = Limit::firstOrCreate();
        return view('panel.limit.index', compact('limit'));
    }

    public function update(LimitUpdateRequest $request)
    {
        $limit = Limit::firstOrCreate();

        try {
            $limit->update([
                'project_limit' => $request->project_limit,
                'news_limit' => $request->news_limit,
                'notice_limit' => $request->notice_limit,
                'photo_limit' => $request->photo_limit
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Limitler güncellenirken bir hata oluştu: ' . $e->getMessage()]);
        }

        return redirect()->route('limit')->with('success', 'Limitler Başarıyla Güncellendi');
    }
}
