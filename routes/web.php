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

    // Projects routes    
    Route::get("/projects/completed_projects", "ProjectController@completed")->name("projects.completed");
    Route::get("/projects/current_projects", "ProjectController@current")->name("projects.current");

    //Route for default templated pages. ---IMPORTANT--- MUST BE ON THE BOTTOM
    Route::get("/{dropdown}/{page}", "PageController@default")->name("default_page");
});



//--------------------------Dasboard start---------------------------
Route::group(["middleware" => "auth"], function() {
    Route::get("/dashboard", "DashboardController@index")->name("dashboard.index");
});
//---------------------------Dasboard end---------------------------

require __DIR__.'/auth.php';
