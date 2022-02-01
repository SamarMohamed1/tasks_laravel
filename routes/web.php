<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use Laravel\Socialite\Facades\Socialite;


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

Route::get('/', function () {
    return view('welcome');
});

Route::get('hello', function () {
    $name = 'mohamed';
    $age = 25;
    return view('hello',[
        'name' => $name,
    ]);
});

Route::get('/posts', [PostController::class, 'index'])->name('posts.index')->middleware(['auth','isAdminMiddleware']);
Route::get('/posts/create',[PostController::class, 'create'])->name('posts.create')->middleware(['auth','isAdminMiddleware']);
Route::post('/posts',[PostController::class, 'store'])->name('posts.store')->middleware(['auth','isAdminMiddleware']);
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show')->middleware('auth');


Route::get('/posts/{post}/edit',[PostController::class, 'edit'])->name('posts.edit')->middleware(['auth','isAdminMiddleware']);
Route::put('/posts/{post}',[PostController::class, 'update'])->name('posts.update')->middleware(['auth','isAdminMiddleware']);
Route::delete('/posts/{post}',[PostController::class, 'destroy'])->name('posts.destroy')->middleware(['auth','isAdminMiddleware']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/auth/redirect', function () {
    return Socialite::driver('github')->redirect();
})->name('auth.github');

Route::get('/auth/callback', function () {
    $user = Socialite::driver('github')->user();

    // $user->token
});






