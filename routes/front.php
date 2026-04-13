<?php

use App\Http\Controllers\Front\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainController::class, 'main'])->name('front.main');
Route::get('/{page_type}/{slug?}', [MainController::class, 'page'])->name('front.page');
