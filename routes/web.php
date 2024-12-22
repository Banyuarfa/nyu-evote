<?php

use App\Events\ChartDataUpdated;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MpkVoteController;
use App\Http\Controllers\OsisVoteController;
use App\Http\Controllers\StatisticsContorller;
use App\Http\Middleware\CheckUserIsAdmin;
use App\Models\Vote;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name("dashboard");
Route::get('/osis', function () {
    return view('osis');
});
Route::post('/osis/vote', [OsisVoteController::class, 'store']);

Route::get('/mpk', function () {
    return view('mpk');
});
Route::post('/mpk/vote', [MpkVoteController::class, 'store']);
Route::get("/statistik", [StatisticsContorller::class, 'index']);
Route::get("/statistik/data", function () {
    $vote_counts = [
        "osis" => Vote::select('paslon', "type", Vote::raw('COUNT(*) as count'))
            ->whereIn('type', ['osis'])
            ->groupBy("paslon")
            ->get(),
        "mpk" => Vote::select('paslon', "type", Vote::raw('COUNT(*) as count'))
            ->whereIn('type', ['mpk'])
            ->groupBy("paslon")
            ->get(),
        "total_osis_mpk" => Vote::select("type", Vote::raw('COUNT(*) as count'))
            ->groupBy("type")
            ->get(),
        "total" => Vote::select(Vote::raw('COUNT(*) as count'))
            ->first()
    ];

    return response()->json($vote_counts);
});
Route::post("/statistik", [StatisticsContorller::class, 'index']);

Route::get("/login", function () {
    return view("login", ["error" => ""]);
});
Route::get("/logout", [AuthController::class, "logout"]);
Route::post("/login", [AuthController::class, "login"]);



// Route::get("/statistik", function () {
//     return view("statistik");
// })->middleware(CheckUserIsAdmin::class);
