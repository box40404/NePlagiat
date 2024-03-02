<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AccountController;

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

Route::prefix("account",)->group(function() {
    Route::get("/logout", [AccountController::class, "logout"]);
})->middleware("auth");

