<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\ActivityTranslation;
use App\Models\Condolence;
use App\Models\Limit;
use App\Models\News;
use App\Models\NewsTranslation;
use App\Models\Notice;
use App\Models\NoticeTranslation;
use App\Models\Page;
use App\Models\PhotoGallery;
use App\Models\PhotoGalleryTranslation;
use App\Models\PhotoGalleryImage;
use App\Models\Project;
use App\Models\Message;
use App\Http\Requests\Admin\MessageCreateRequest;
use App\Http\Requests\Admin\SuggestionCreateRequest;
use App\Models\Suggestion;
use App\Models\ProjectCategory;
use App\Models\ProjectTranslation;
use App\Models\QuickMenu;
use App\Models\StaffGroup;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function main()
    {
        $duyurular = Notice::with('notice_translations')->where('is_active', true)->orderBy('order')->get();

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

        $taziyeler = Condolence::where('is_active', true)->get();

        $projeler = Project::with('project_translations')->where('is_active', true)->orderBy('order')->get();

        $haberler = News::with('news_translations')->where(['is_active' => true, 'is_homepage' => true])->orderBy('order')->get();


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

                $quickMenu = QuickMenu::where('is_active', true)->orderBy('order')->get();

                $projectCategory = ProjectCategory::with('projects.project_translations')->where(['is_active' => true, 'slug' => $slug])->orderBy('order')->first();

                return view('front.page', compact('quickMenu', 'page_type', 'projectCategory'));

                break;
            case 'proje':

                $quickMenu = QuickMenu::where('is_active', true)->orderBy('order')->get();
                $project = ProjectTranslation::with('project.images')->where('slug', $slug)->first();

                return view('front.page', compact('quickMenu', 'page_type', 'project'));

                break;
            case 'haber':

                $quickMenu = QuickMenu::where('is_active', true)->orderBy('order')->get();
                $new = NewsTranslation::with('news.images')->where('slug', $slug)->first();

                return view('front.page', compact('quickMenu', 'page_type', 'new'));

                break;
            case 'foto-galeri':

                $quickMenu = QuickMenu::where('is_active', true)->orderBy('order')->get();
                $galleries = PhotoGallery::with('photo_gallery_translations')->where('is_active', true)->orderBy('order')->get();

                return view('front.page', compact('quickMenu', 'page_type', 'galleries'));

                break;
            case 'video-galeri':

                abort(404);

                break;
            case 'etkinlikler':

                $today = Carbon::today();
                $quickMenu = QuickMenu::where('is_active', true)->orderBy('order')->get();
                $allActivities = Activity::with('activity_translations')->where('is_active', true)->orderBy('order')->get();
                $pastActivities = Activity::with('activity_translations')->where('is_active', true)->orderBy('order')
                    ->whereHas('activity_translations', function ($q) use ($today) {
                        $q->where('start_date', '<', $today);
                    })
                    ->get();
                $futureActivities = Activity::with('activity_translations')->where('is_active', true)->orderBy('order')
                    ->whereHas('activity_translations', function ($q) use ($today) {
                        $q->where('start_date', '>=', $today);
                    })
                    ->get();

                return view('front.page', compact('quickMenu', 'page_type', 'allActivities', 'pastActivities', 'futureActivities'));

                break;
            case 'etkinlik':

                $quickMenu = QuickMenu::where('is_active', true)->orderBy('order')->get();
                $activity = ActivityTranslation::with('activity')->where('slug', $slug)->first();

                return view('front.page', compact('quickMenu', 'page_type', 'activity'));

                break;
            case 'duyurular':

                $quickMenu = QuickMenu::where('is_active', true)->orderBy('order')->get();
                $notices = Notice::with('notice_translations')->where('is_active', true)->orderBy('order')->get();

                return view('front.page', compact('quickMenu', 'page_type', 'notices'));

                break;
            case 'haberler':

                $quickMenu = QuickMenu::where('is_active', true)->orderBy('order')->get();
                $limit = Limit::first();

                $news = News::with('news_translations')->where('is_active', true)->orderBy('order')->paginate($limit->news_limit);

                return view('front.page', compact('quickMenu', 'page_type', 'news', 'limit'));

                break;
            case 'iletisim':

                $quickMenu = QuickMenu::where('is_active', true)->orderBy('order')->get();

                return view('front.page', compact('quickMenu', 'page_type'));

                break;
            case 'mesaj':

                $quickMenu = QuickMenu::where('is_active', true)->orderBy('order')->get();
                $message = Condolence::where(['is_active' => true, 'slug' => $slug])->first();

                return view('front.page', compact('quickMenu', 'page_type', 'message'));

                break;
            case 'duyuru':

                $quickMenu = QuickMenu::where('is_active', true)->orderBy('order')->get();
                $notice = NoticeTranslation::with('notice')->where('slug', $slug)->first();

                return view('front.page', compact('quickMenu', 'page_type', 'notice'));

                break;
            case 'foto':

                $quickMenu = QuickMenu::where('is_active', true)->orderBy('order')->get();
                $limit = Limit::first();

                $gallery = PhotoGalleryTranslation::with('photo_gallery')->where('slug', $slug)->first();

                $images = $gallery->photo_gallery->images()->paginate($limit->photo_limit);

                return view('front.page', compact('quickMenu', 'page_type', 'gallery', 'images'));

                break;
            default:
                abort(404);
                break;
        }
    }

    public function message(MessageCreateRequest $request)
    {
        try {
            Message::create([
                'fullname' => $request->fullname,
                'email' => $request->email,
                'title' => $request->title,
                'content' => $request->content
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Mesajınız gönderilirken bir hata oluştu: ' . $e->getMessage()]);
        }

        return redirect()->back()->with('success', 'Mesajınız başarıyla gönderildi');
    }

    public function suggestion(SuggestionCreateRequest $request)
    {
        try {
            Suggestion::create([
                'fullname' => $request->fullname,
                'tc' => $request->tc,
                'birthdate' => $request->birthdate,
                'job' => $request->job,
                'address' => $request->address,
                'content' => $request->content,
                'answer_type' => $request->answer_type,
                'email' => $request->email,
                'gender' => $request->gender,
                'disability_status' => $request->disability_status,
                'education_status' => $request->education_status
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Talebiniz gönderilirken bir hata oluştu: ' . $e->getMessage()]);
        }

        return redirect()->back()->with('success', 'Talebiniz başarıyla gönderildi');
    }


}
