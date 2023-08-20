<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
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
Route::get('register', [RegisterController::class, 'create']);
Route::post('register', [RegisterController::class, 'store']);
