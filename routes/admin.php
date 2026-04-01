<?php


use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\Admin\Menu\MainMenuController;

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

    // Ana Modüllerin yönlendirmeleri
    Route::prefix('/menu-yonetimi/mainmenu')->group(function () {
        Route::get('/', [MainMenuController::class, 'index'])->name('mainmenu');
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
    Route::get('/condolence', function () {
        return view('panel.condolence.index');
    })->name('condolence');
    Route::get('/news', function () {
        return view('panel.news.index');
    })->name('news');
    Route::get('/photo', function () {
        return view('panel.photo.index');
    })->name('photo');
    Route::get('/video', function () {
        return view('panel.video.index');
    })->name('video');
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
    Route::get('/limit', function () {
        return view('panel.limit.index');
    })->name('limit');
    Route::get('/theme', function () {
        return view('panel.theme.index');
    })->name('theme');
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
