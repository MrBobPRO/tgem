<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(["middleware" => "auth"], function () {
    Route::get("/", "MainController@home")->name("home");

    // Projects    
    Route::get("/projects/completed_projects", "ProjectController@completed")->name("projects.completed");
    Route::get("/projects/current_projects", "ProjectController@current")->name("projects.current");
    Route::get("/project/{url}", "ProjectController@single")->name("projects.single");

    //News
    Route::get("/media/company_news", "NewsController@company")->name("news.company");
    Route::get("/media/industry_news", "NewsController@industry")->name("news.industry");
    Route::get("/news/{url}", "NewsController@single")->name("news.single");

    //gallery
    Route::get("/media/gallery", "GalleryController@index")->name("galleries.index");
    Route::get("/media/gallery/{url}", "GalleryController@single")->name("galleries.single");

    //Vacancies
    Route::get("/career/vacancies", "VacancyController@index")->name("vacancies.index");

    //contacts
    Route::get("/contacts/our_contacts", "ContactController@index")->name("contacts.index");
    Route::get("/contacts/online_booking", "ContactController@booking")->name("contacts.booking");

    //Route for default templated pages. ---IMPORTANT--- MUST BE ON THE BOTTOM
    Route::get("/{dropdown}/{page}", "PageController@default")->name("default_page");
});



//--------------------------Dasboard start---------------------------
Route::group(["middleware" => "auth"], function() {
    Route::get("/dashboard", "DashboardController@index")->name("dashboard.index");
});
//---------------------------Dasboard end---------------------------

require __DIR__.'/auth.php';
