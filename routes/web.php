<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AccountController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GroupsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('index');
})->middleware("auth");




//    //Account//    //

Route::match(["get", "post"], "/login", [AccountController::class, "login"])->name("login");
Route::match(["get", "post"], "/register", [AccountController::class, "register"])->name("register");

Route::prefix("account")->group(function() {
    Route::get("/logout", [AccountController::class, "logout"]);
})->middleware("auth");


//  //Profile// //

Route::middleware("auth")->group(function() {
    Route::prefix("profile")->group(function(){
        Route::get("/", [ProfileController::class, "show"]);
    });
});


//  //Groups//  //

Route::get("/groups", [GroupsController::class, "show"])->middleware("auth");
Route::get("/groups/{id}", [GroupsController::class, "showDetails"])->middleware("auth");
