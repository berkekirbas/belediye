<?php


use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\Admin\Menu\MainMenuController;
use App\Http\Controllers\Admin\Condolence\CondolenceController;
use App\Http\Controllers\Admin\Theme\ThemeController;
use App\Http\Controllers\Admin\Limit\LimitController;

use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
use Illuminate\Support\Facades\Route;


// giriş yapmamış kullanıcılar
Route::prefix('/panel')->middleware('redirect.dashboard')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

// giriş yapmış kullanıcılar
Route::prefix('/panel')->middleware('admin.auth')->group(function () {
    Route::get('/', function () {
        return view('panel.dashboard');
    })->name('dashboard');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Ana Menü Modüllerin yönlendirmeleri
Route::prefix('/menu-yonetimi/mainmenu')->group(function () {
    Route::get('/', [MainMenuController::class, 'index'])->name('mainmenu');
    Route::get('/add', [MainMenuController::class, 'add'])->name('mainmenu.add');
    Route::post('/add', [MainMenuController::class, 'store'])->name('mainmenu.store');
    Route::get('/edit/{id}', [MainMenuController::class, 'edit'])->name('mainmenu.edit');
    Route::post('/edit/{id}', [MainMenuController::class, 'update'])->name('mainmenu.update');
    Route::delete('/destroy/{id}', [MainMenuController::class, 'destroy'])->name('mainmenu.destroy');
});

// Taziye & Başsağlığı Modüllerin yönlendirmeleri
Route::prefix('/condolence')->group(function () {
    Route::get('/', [CondolenceController::class, 'index'])->name('condolence');
    Route::get('/add', [CondolenceController::class, 'add'])->name('condolence.add');
    Route::post('/add', [CondolenceController::class, 'store'])->name('condolence.store');
    Route::get('/edit/{id}', [CondolenceController::class, 'edit'])->name('condolence.edit');
    Route::post('/edit/{id}', [CondolenceController::class, 'update'])->name('condolence.update');
    Route::delete('/destroy/{id}', [CondolenceController::class, 'destroy'])->name('condolence.destroy');
});

// Tema Modülünün yönlendirmeleri
Route::prefix('/theme')->group(function () {
    Route::get('/', [ThemeController::class, 'index'])->name('theme');
    Route::post('/update', [ThemeController::class, 'update'])->name('theme.update');
});

// Limit Modülünün yönlendirmeleri
Route::prefix('/limit')->group(function () {
    Route::get('/', [LimitController::class, 'index'])->name('limit');
    Route::post('/update', [LimitController::class, 'update'])->name('limit.update');
});



    Route::get('/pages', function () {
        return view('panel.pages.index');
    })->name('pages');
    Route::get('/services', function () {
        return view('panel.services.index');
    })->name('services');
    Route::get('/activity', function () {
        return view('panel.activity.index');
    })->name('activity');
    Route::get('/notice', function () {
        return view('panel.notice.index');
    })->name('notice');
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
    Route::get('/settings', function () {
        return view('panel.settings.index');
    })->name('settings');


    Route::get('/footermenu', function () {
        return view('panel.footermenu.index');
    })->name('footermenu');
    Route::get('/middlelink', function () {
        return view('panel.middlelink.index');
    })->name('middlelink');
    Route::get('/quickmenu', function () {
        return view('panel.quickmenu.index');
    })->name('quickmenu');
    Route::get('/sms', function () {
        return view('panel.sms.index');
    })->name('sms');
    Route::get('/module', function () {
        return view('panel.module.index');
    })->name('module');
    Route::get('/mail', function () {
        return view('panel.mail.index');
    })->name('mail');
    Route::get('/users', function () {
        return view('panel.users.index');
    })->name('users');

    // Ekleme Modüllerin yönlendirmeleri

    Route::get('/pages/add', function () {
        return view('panel.pages.add');
    })->name('pages.add');
    Route::get('/users/add', function () {
        return view('panel.users.add');
    })->name('users.add');
});
