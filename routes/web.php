<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\PostCommentsController;
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
    Route::post(
        'posts/{post:slug}/comment',
        [PostCommentsController::class, 'store']
    ) -> middleware('auth');

    //
    // register/login users
    //
    // use Laravel existing middleware
    // access only for not signed in users
    //
    Route::get('register', [RegisterController::class, 'create'])
    -> middleware('guest');

    Route::post('register', [RegisterController::class, 'store'])
    -> middleware('guest');

    Route::get('login', [SessionController::class, 'create'])
    -> middleware('guest');

    Route::post('sessions', [SessionController::class, 'store'])
    -> middleware('guest');

    Route::post('logout', [SessionController::class, 'destroy'])
    -> middleware('auth');




    //
    // Admin
    //
    Route::middleware('can:admin')->group(
        function () {
            Route::resource('admin/posts', AdminPostController::class)->except('show');
        }
    );
    // Route::get('admin/posts', [AdminPostController::class, 'index'])
    // -> middleware('admin');
    //
    // Route::post('admin/posts', [AdminPostController::class, 'store'])
    // -> middleware('admin');
    //
    // Route::get('admin/posts/create', [AdminPostController::class, 'create'])
    // -> middleware('admin');
    //
    // Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit'])
    // -> middleware('admin');
    //
    // Route::patch('admin/posts/{post}', [AdminPostController::class, 'update'])
    // -> middleware('admin');
    //
    // Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy'])
    // -> middleware('admin');
