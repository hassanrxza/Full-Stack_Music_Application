<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AudioController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VideoController;

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

Route::get('/', function ()
{
    return view('pages.home.index');
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/contact', [UserController::class, 'contact']);
Route::get('/about', [UserController::class, 'about']);
Route::get('/albums', [UserController::class, 'albums']);
Route::get('/redirect', [UserController::class, 'redirect'])->middleware('auth');
Route::get('/video', [UserController::class, 'video']);
Route::get('/audio', [UserController::class, 'audio']);

Route::get('/dashboard', [AdminController::class, 'index'])->middleware('auth');
Route::resource('/posts', PostController::class)->middleware('auth');
Route::post('/posts/{id}', [PostController::class, 'update']);

Route::get('/artists', [AdminController::class, 'artist']);
Route::post('/addArtist', [AdminController::class, 'addArtist']);

Route::get('/album', [AdminController::class, 'album']);
Route::post('/addAlbum', [AdminController::class, 'addAlbum']);

Route::get('/genres', [AdminController::class, 'genres']);
Route::post('/addGenre', [AdminController::class, 'addGenre']);

Route::get('/video/{id}', [VideoController::class, 'show'])->name('video.show');
Route::get('/audio/{id}', [AudioController::class, 'show'])->name('audio.show');

Route::post('/addReview', [PostController::class, 'reviewrating'])->name('review.store');
