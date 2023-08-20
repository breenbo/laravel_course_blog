<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
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

//
// filtering is handeld by the PostController
//
    // named route
    Route::get('/', [PostController::class, 'index']) -> name('home');

    //
    // {post} is a variable called slug, and used in the callback function
    //
    Route::get('posts/{post:slug}', [PostController::class, 'show']);

//
// register/login users
//
// use Laravel existing middleware
// access only for not signed in users
//
Route::get('register', [RegisterController::class, 'create']) -> middleware('guest');
Route::post('register', [RegisterController::class, 'store']) -> middleware('guest');

Route::get('login', [SessionController::class, 'create']) -> middleware('guest');
Route::post('sessions', [SessionController::class, 'store']) -> middleware('guest');

Route::post('logout', [SessionController::class, 'destroy']) -> middleware('auth');
