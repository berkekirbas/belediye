<?php

namespace App\Providers;

use App\Models\FooterMenu;
use App\Models\MainMenu;
use App\Models\Settings;
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
        View::composer('front.layout.app', function ($view) {
            $view->with('settings', Settings::first());
            $view->with('main_menu', MainMenu::whereNull('parent_id')->get());
            $view->with('footer_menu', FooterMenu::whereNull('parent_id')->get());
        });
    }
}
