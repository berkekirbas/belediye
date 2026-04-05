<?php


use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\Admin\Menu\MainMenuController;
use App\Http\Controllers\Admin\Page\PageController;
use App\Http\Controllers\Admin\Condolence\CondolenceController;
use App\Http\Controllers\Admin\Theme\ThemeController;
use App\Http\Controllers\Admin\Limit\LimitController;
use App\Http\Controllers\Admin\Users\UsersController;
use App\Http\Controllers\Admin\Activity\ActivityController;
use App\Http\Controllers\Admin\Notice\NoticeController;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\Route;


// giriş yapmamış kullanıcılar
Route::prefix('/panel')->middleware('redirect.dashboard')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});


// giriş yapmış kullanıcılar -> admin
Route::prefix('/panel')->middleware(['auth', 'checkRole'])->group(function () {

    Route::get('/settings', function () {
        return view('panel.settings.index');
    })->name('settings');

    // Ana Menü Modüllerin yönlendirmeleri
    Route::prefix('/menu-yonetimi/mainmenu')->group(function () {
        Route::get('/', [MainMenuController::class, 'index'])->name('mainmenu');
        Route::get('/add', [MainMenuController::class, 'add'])->name('mainmenu.add');
        Route::post('/add', [MainMenuController::class, 'store'])->name('mainmenu.store');
        Route::get('/edit/{id}', [MainMenuController::class, 'edit'])->name('mainmenu.edit');
        Route::post('/edit/{id}', [MainMenuController::class, 'update'])->name('mainmenu.update');
        Route::delete('/destroy/{id}', [MainMenuController::class, 'destroy'])->name('mainmenu.destroy');
    });

    Route::get('/footermenu', function () {
        return view('panel.footermenu.index');
    })->name('footermenu');
    Route::get('/quickmenu', function () {
        return view('panel.quickmenu.index');
    })->name('quickmenu');

    // Limit Modülünün yönlendirmeleri
    Route::prefix('/limit')->group(function () {
        Route::get('/', [LimitController::class, 'index'])->name('limit');
        Route::post('/update', [LimitController::class, 'update'])->name('limit.update');
    });

    // Tema Modülünün yönlendirmeleri
    Route::prefix('/theme')->group(function () {
        Route::get('/', [ThemeController::class, 'index'])->name('theme');
        Route::post('/update', [ThemeController::class, 'update'])->name('theme.update');
    });


    Route::get('/module', function () {
        return view('panel.module.index');
    })->name('module');

    // Kullanıcı Modüllerin yönlendirmeleri
    Route::prefix('/users')->group(function () {
        Route::get('/', [UsersController::class, 'index'])->name('users');
        Route::get('/add', [UsersController::class, 'add'])->name('users.add');
        Route::post('/add', [UsersController::class, 'store'])->name('users.store');
        Route::get('/edit/{id}', [UsersController::class, 'edit'])->name('users.edit');
        Route::post('/edit/{id}', [UsersController::class, 'update'])->name('users.update');
        Route::delete('/destroy/{id}', [UsersController::class, 'destroy'])->name('users.destroy');
    });
});

// giriş yapmış kullanıcılar -> admin ve editör
Route::prefix('/panel')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('panel.dashboard');
    })->name('dashboard');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


    // Taziye & Başsağlığı Modüllerin yönlendirmeleri
    Route::prefix('/condolence')->group(function () {
        Route::get('/', [CondolenceController::class, 'index'])->name('condolence');
        Route::get('/add', [CondolenceController::class, 'add'])->name('condolence.add');
        Route::post('/add', [CondolenceController::class, 'store'])->name('condolence.store');
        Route::get('/edit/{id}', [CondolenceController::class, 'edit'])->name('condolence.edit');
        Route::post('/edit/{id}', [CondolenceController::class, 'update'])->name('condolence.update');
        Route::delete('/destroy/{id}', [CondolenceController::class, 'destroy'])->name('condolence.destroy');
    });

    // Sayfa Yönetim Modülünün yönlendirmeleri
    Route::prefix('/pages')->group(function () {
        Route::get('/', [PageController::class, 'index'])->name('pages');
        Route::get('/add', [PageController::class, 'add'])->name('pages.add');
        Route::post('/add', [PageController::class, 'store'])->name('pages.store');
        Route::get('/edit/{id}', [PageController::class, 'edit'])->name('pages.edit');
        Route::post('/edit/{id}', [PageController::class, 'update'])->name('pages.update');
        Route::delete('/destroy/{id}', [PageController::class, 'destroy'])->name('pages.destroy');
    });

    // Etkinlik Yönetim Modülünün yönlendirmeleri
    Route::prefix('/activity')->group(function () {
        Route::get('/', [ActivityController::class, 'index'])->name('activity');
        Route::get('/add', [ActivityController::class, 'add'])->name('activity.add');
        Route::post('/add', [ActivityController::class, 'store'])->name('activity.store');
        Route::get('/edit/{id}', [ActivityController::class, 'edit'])->name('activity.edit');
        Route::post('/edit/{id}', [ActivityController::class, 'update'])->name('activity.update');
        Route::delete('/destroy/{id}', [ActivityController::class, 'destroy'])->name('activity.destroy');
    });

    // Duyuru Yönetim Modülünün yönlendirmeleri
    Route::prefix('/notice')->group(function () {
        Route::get('/', [NoticeController::class, 'index'])->name('notice');
        Route::get('/add', [NoticeController::class, 'add'])->name('notice.add');
        Route::post('/add', [NoticeController::class, 'store'])->name('notice.store');
        Route::get('/edit/{id}', [NoticeController::class, 'edit'])->name('notice.edit');
        Route::post('/edit/{id}', [NoticeController::class, 'update'])->name('notice.update');
        Route::delete('/destroy/{id}', [NoticeController::class, 'destroy'])->name('notice.destroy');
    });


    Route::get('/corporate', function () {
        return view('panel.corporate.index');
    })->name('corporate');
    Route::get('/contact', function () {
        return view('panel.contact.index');
    })->name('contact');
    Route::get('/suggestion', function () {
        return view('panel.suggestion.index');
    })->name('suggestion');
    Route::get('/project', function () {
        return view('panel.project.index');
    })->name('project');
    Route::get('/news', function () {
        return view('panel.news.index');
    })->name('news');
    Route::get('/photo', function () {
        return view('panel.photo.index');
    })->name('photo');
    Route::get('/language', function () {
        return view('panel.language.index');
    })->name('language');
    Route::get('/message', function () {
        return view('panel.message.index');
    })->name('message');
    Route::get('/newsletter', function () {
        return view('panel.newsletter.index');
    })->name('newsletter');
});
