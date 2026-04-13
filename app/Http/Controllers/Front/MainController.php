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
use App\Models\StaffGroup;
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

    public function page($page_type, $slug = null)
    {

        switch ($page_type) {
            case 'sayfa':
                $page = Page::with('translations')->whereHas('translations', function ($query) use ($slug) {
                    $query->where('slug', $slug);
                })->first();

                if (!$page) {
                    abort(404);
                }

                $quickMenu = QuickMenu::where('is_active', true)->orderBy('order')->get();

                return view('front.page', compact('page', 'quickMenu', 'page_type'));


                break;
            case 'kurumsal-yapi':
                $quickMenu = QuickMenu::where('is_active', true)->orderBy('order')->get();
                $staffGroup = StaffGroup::with('staffs')->where(['is_active' => true, 'slug' => $slug])->orderBy('order')->first();

                return view('front.page', compact('quickMenu', 'page_type', 'staffGroup'));

                break;
            case 'kategori':
                break;
            case 'foto':
                break;
            case 'haber':
                break;
            case 'foto-galeri':
                break;
            case 'video-galeri':
                break;
            case 'etkinlikler':
                break;
            case 'duyurular':
                break;
            case 'haberler':
                break;
            case 'iletisim':
                break;
            default:
                abort(404);
                break;
        }
    }
}
