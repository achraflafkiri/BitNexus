<?php

use App\Http\Controllers\torrentController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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
    $torrents = DB::table('torrents')
        ->select('torrents.*')
        ->orderBy("created_at", "desc")
        ->limit(3)
        ->get();
    return view('welcome', ["torrents" => $torrents]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Torrents
Route::get('/torrents', [torrentController::class, 'index']);
Route::middleware([Authenticate::class])->group(function () {
    Route::get('/torrents/create', [torrentController::class, 'create']);
    Route::post('/torrents/post', [torrentController::class, 'store']);
    Route::get('/torrents/{torrent}', [torrentController::class, 'show']);
    Route::get('/torrents/{torrent}/edit', [torrentController::class, 'edit']);
    Route::put('/torrents/{torrent}', [torrentController::class, 'update']);
    Route::delete('/torrents/{torrent}', [torrentController::class, 'destroy']);
});
