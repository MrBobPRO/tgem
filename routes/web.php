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
});


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

    //News
    Route::get("/dashboard/news", "NewsController@dashboard_index")->name("dashboard.news.index");
});
//---------------------------Dasboard end---------------------------

require __DIR__.'/auth.php';

//--------------------------IMPORTANT. MUST BE AT THE BOTTOM!!!---------------------------
Route::get("/{dropdown}/{page}", "PageController@default")->name("default_page");
//--------------------------IMPORTANT. MUST BE AT THE BOTTOM!!!---------------------------