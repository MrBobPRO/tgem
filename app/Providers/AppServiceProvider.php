<?php

namespace App\Providers;

use App\Models\Booking;
use App\Models\Dropdown;
use App\Models\News;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Schema::defaultStringLength(191);
        Paginator::useBootstrap();

        View::composer(["templates.master", "dashboard.templates.master"], function ($view) {
            $view->with("route", Route::currentRouteName());
        });

        View::composer(["templates.header", "pages.default_template"], function($view) {
            $view->with("dropdowns", Dropdown::orderBy("priority", "asc")->get());
        });

        View::composer(["templates.footer"], function($view) {
            $view->with("footer_news", News::latest()->take(2)->get());
        });

        View::composer(["dashboard.templates.archives.images"], function($view) {
            //get array of all files in archive folder excluding folders
            $path = public_path('img/archive');
            $files = scandir($path);
            // exclude folders & gitignore
            $files = array_diff($files, array(".", "..", ".gitignore", "small", "medium"));
            //sort by name
            sort($files);

            $view->with("images", $files);
        });

        View::composer(["dashboard.templates.aside"], function($view) {
            $view->with("new_booking_records_count", Booking::where("new", true)->count());
        });

    }
}
