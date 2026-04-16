<?php

namespace App\Providers;

use App\Models\FooterMenu;
use App\Models\MainMenu;
use App\Models\Settings;
use App\Models\Theme;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('front.*', function ($view) {
            $view->with('settings', Settings::first());
            $view->with('theme', Theme::first());
            $view->with('main_menu', MainMenu::with('children')->whereNull('parent_id')->orderBy('order')->get());
            $view->with('footer_menu', FooterMenu::with('children')->whereNull('parent_id')->orderBy('order')->get());
        });
    }
}
