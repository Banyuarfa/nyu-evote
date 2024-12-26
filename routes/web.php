<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MpkVoteController;
use App\Http\Controllers\OsisVoteController;
use App\Http\Controllers\StatisticsController;
use Illuminate\Support\Facades\Route;

Route::get(
    '/',
    fn() => view('dashboard')
)->name("dashboard");

Route::get(
    "/login",
    fn() => view("login", ["error" => ""])
)->name("login");
Route::post("/login", [AuthController::class, "login"])->name('login')->name("login.process");
Route::get("/logout", [AuthController::class, "logout"])->name('logout')->name("logout");

Route::get('/osis', [OsisVoteController::class, "index"])->name("osis");
Route::get(
    '/mpk',
    fn() => view('mpk')
)->name("mpk");

Route::post('/osis/vote', [OsisVoteController::class, 'store'])->name("osis.vote");
Route::post('/mpk/vote', [MpkVoteController::class, 'store'])->name("mpk.vote");

Route::middleware(['auth'])->group(function () {
    Route::get("/statistik", [StatisticsController::class, 'index'])->name("statistics");
    Route::get("/statistik/data", [StatisticsController::class, "getData"])->name("statistics.data");
});
