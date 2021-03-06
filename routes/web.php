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

Route::get("/", "MainController@home")->name("home");

Route::get("/search", "MainController@search")->name("search");
Route::post("/switch-locale", "LocaleController@switch")->name("locale.switch");

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
Route::get("/career/vacancies/{url}", "VacancyController@single")->name("vacancies.single");
//contacts
Route::get("/contacts/our_contacts", "ContactController@index")->name("contacts.index");
Route::get("/contacts/online_booking", "ContactController@booking")->name("contacts.booking");
Route::post("/booking/email", "BookingController@email")->name("booking.email");


//--------------------------Dasboard start---------------------------
Route::group(["middleware" => "auth"], function() {
    //dropdowns
    Route::get("/dashboard", "DashboardController@index")->name("dashboard.index");
    Route::get("/dashboard/dropdowns/create", "DropdownController@dashboard_create")->name("dashboard.dropdowns.create");
    Route::get("/dashboard/dropdown/{id}", "DropdownController@dashboard_single")->name("dashboard.dropdowns.single");

    Route::post("/dropdowns/update", "DropdownController@update")->name("dropdowns.update");
    Route::post("/dropdowns/store", "DropdownController@store")->name("dropdowns.store");
    Route::post("/dropdowns/remove", "DropdownController@remove")->name("dropdowns.remove");
    Route::post("/dropdowns/remove_multiple", "DropdownController@remove_multiple")->name("dropdowns.remove_multiple");

    //pages
    Route::get("/dashboard/dropdowns/{dropdown}/pages", "PageController@dashboard_index")->name("dashboard.pages.index");
    Route::get("/dashboard/pages/create", "PageController@dashboard_create")->name("dashboard.pages.create");
    Route::get("/dashboard/pages/{id}", "PageController@dashboard_single")->name("dashboard.pages.single");

    Route::post("/pages/update", "PageController@update")->name("pages.update");
    Route::post("/pages/store", "PageController@store")->name("pages.store");
    Route::post("/pages/remove", "PageController@remove")->name("pages.remove");
    Route::post("/pages/remove_multiple", "PageController@remove_multiple")->name("pages.remove_multiple");

    //slider
    Route::get("/dashboard/slider", "SliderController@dashboard_index")->name("dashboard.slider.index");
    Route::get("/dashboard/slider/create", "SliderController@dashboard_create")->name("dashboard.slider.create");
    Route::get("/dashboard/slider/{id}", "SliderController@dashboard_single")->name("dashboard.slider.single");

    Route::post("/slider/update", "SliderController@update")->name("slider.update");
    Route::post("/slider/store", "SliderController@store")->name("slider.store");
    Route::post("/slider/remove", "SliderController@remove")->name("slider.remove");
    Route::post("/slider/remove_multiple", "SliderController@remove_multiple")->name("slider.remove_multiple");

    //news
    Route::get("/dashboard/news", "NewsController@dashboard_index")->name("dashboard.news.index");
    Route::get("/dashboard/news/create", "NewsController@dashboard_create")->name("dashboard.news.create");
    Route::get("/dashboard/news/{id}", "NewsController@dashboard_single")->name("dashboard.news.single");

    Route::post("/news/update", "NewsController@update")->name("news.update");
    Route::post("/news/store", "NewsController@store")->name("news.store");
    Route::post("/news/remove", "NewsController@remove")->name("news.remove");
    Route::post("/news/remove_multiple", "NewsController@remove_multiple")->name("news.remove_multiple");

    //projects
    Route::get("/dashboard/projects", "ProjectController@dashboard_index")->name("dashboard.projects.index");
    Route::get("/dashboard/projects/create", "ProjectController@dashboard_create")->name("dashboard.projects.create");
    Route::get("/dashboard/projects/{id}", "ProjectController@dashboard_single")->name("dashboard.projects.single");

    Route::post("/projects/update", "ProjectController@update")->name("projects.update");
    Route::post("/projects/store", "ProjectController@store")->name("projects.store");
    Route::post("/projects/remove", "ProjectController@remove")->name("projects.remove");
    Route::post("/projects/remove_multiple", "ProjectController@remove_multiple")->name("projects.remove_multiple");

    //project groups
    Route::get("/dashboard/project_groups", "ProjectGroupController@dashboard_index")->name("dashboard.projects.groups.index");
    Route::get("/dashboard/project_groups/create", "ProjectGroupController@dashboard_create")->name("dashboard.projects.groups.create");
    Route::get("/dashboard/project_groups/{id}", "ProjectGroupController@dashboard_single")->name("dashboard.projects.groups.single");

    Route::post("/projects/groups/update", "ProjectGroupController@update")->name("projects.groups.update");
    Route::post("/projects/groups/store", "ProjectGroupController@store")->name("projects.groups.store");
    Route::post("/projects/groups/remove", "ProjectGroupController@remove")->name("projects.groups.remove");
    Route::post("/projects/groups/remove_multiple", "ProjectGroupController@remove_multiple")->name("projects.groups.remove_multiple");

    //vacancies
    Route::get("/dashboard/vacancies", "VacancyController@dashboard_index")->name("dashboard.vacancies.index");
    Route::get("/dashboard/vacancies/create", "VacancyController@dashboard_create")->name("dashboard.vacancies.create");
    Route::get("/dashboard/vacancies/{id}", "VacancyController@dashboard_single")->name("dashboard.vacancies.single");

    Route::post("/vacancies/update", "VacancyController@update")->name("vacancies.update");
    Route::post("/vacancies/store", "VacancyController@store")->name("vacancies.store");
    Route::post("/vacancies/remove", "VacancyController@remove")->name("vacancies.remove");
    Route::post("/vacancies/remove_multiple", "VacancyController@remove_multiple")->name("vacancies.remove_multiple");

    //galleries
    Route::get("/dashboard/galleries", "GalleryController@dashboard_index")->name("dashboard.galleries.index");
    Route::get("/dashboard/galleries/create", "GalleryController@dashboard_create")->name("dashboard.galleries.create");
    Route::get("/dashboard/galleries/{id}", "GalleryController@dashboard_single")->name("dashboard.galleries.single");

    Route::post("/galleries/update", "GalleryController@update")->name("galleries.update");
    Route::post("/galleries/store", "GalleryController@store")->name("galleries.store");
    Route::post("/galleries/remove", "GalleryController@remove")->name("galleries.remove");
    Route::post("/galleries/remove_multiple", "GalleryController@remove_multiple")->name("galleries.remove_multiple");

    //options
    Route::get('/dashboard/options', "OptionController@dashboard_index")->name('dashboard.options.index');
    Route::get('/dashboard/options/{id}', "OptionController@dashboard_single")->name('dashboard.options.single');
    Route::post('/options/update', "OptionController@update")->name('options.update');

    //options
    Route::get('/dashboard/translations', "TranslationController@dashboard_index")->name('dashboard.translations.index');
    Route::get('/dashboard/translations/{value}', "TranslationController@dashboard_single")->name('dashboard.translations.single');
    Route::post('/translations/update', "TranslationController@update")->name('translations.update');

    //images
    Route::post("/images/store", "ImageController@store")->name("images.store");
    Route::post("/images/update", "ImageController@update")->name("images.update");
    Route::post("/images/remove", "ImageController@remove")->name("images.remove");
});
//---------------------------Dasboard end---------------------------

require __DIR__.'/auth.php';
require __DIR__.'/redirects.php';

//--------------------------IMPORTANT. MUST BE AT THE BOTTOM!!!---------------------------
Route::get("/{dropdown}/{page}", "PageController@default")->name("default_page");
//--------------------------IMPORTANT. MUST BE AT THE BOTTOM!!!---------------------------