<?php

use App\Http\Controllers\torrentController;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::get('/torrents', [torrentController::class, 'index']);
Route::get('/torrents/create', [torrentController::class, 'create']);
Route::post('/torrents/post', [torrentController::class, 'store']);
Route::get('/torrents/{torrent}', [torrentController::class, 'show']);
Route::get('/torrents/{torrent}/edit', [torrentController::class, 'edit']);
Route::put('/torrents/{torrent}', [torrentController::class, 'update']);
Route::delete('/torrents/{torrent}', [torrentController::class, 'destroy']);
