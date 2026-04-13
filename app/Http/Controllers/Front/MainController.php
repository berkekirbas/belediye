<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Condolence;
use App\Models\News;
use App\Models\Notice;
use App\Models\Page;
use App\Models\PhotoGallery;
use App\Models\Project;
use App\Models\QuickMenu;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function main()
    {
        $duyurular = Notice::with('notice_translation')->where('is_active', true)->orderBy('order')->get();

        $etkinlik = Activity::with([
            'activity_translations:id,activity_id,title,start_date,end_date,content,location',
        ])
            ->where('is_active', true)
            ->orderBy('order')
            ->get();

        $galeriler = PhotoGallery::with(['photo_gallery_translations:id,photo_gallery_id,title,slug'])
            ->where('is_active', true)
            ->orderBy('order')
            ->get();

        $taziyeler = Condolence::with('condolence_translation')->where('is_active', true)->get();

        $projeler = Project::with('project_translations')->where('is_active', true)->orderBy('order')->get();

        $haberler = News::with('news_translations')->where('is_active', true)->orderBy('order')->get();


        return view('front.main', compact('duyurular', 'etkinlik', 'galeriler', 'taziyeler', 'projeler', 'haberler'));
    }

    public function page($slug)
    {
        $page = Page::with('translations')->whereHas('translations', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })->first();

        if (!$page) {
            abort(404);
        }

        $quickMenu = QuickMenu::where('is_active', true)->orderBy('order')->get();

        return view('front.page', compact('page', 'quickMenu'));
    }
}
