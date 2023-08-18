<?php

use App\Http\Controllers\PostController;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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

    // named route
    Route::get('/', [PostController::class, 'index']) -> name('home');

    //
    // {post} is a variable called slug, and used in the callback function
    //
    Route::get('posts/{post:slug}', [PostController::class, 'show']);


    Route::get(
        'categories/{category:slug}', function (Category $category) {
            return view(
                'posts', [
                'posts' => $category->posts,
                'currentCategory' => $category,
                'categories' => Category::all()
                ]
            );
        }
    );


    Route::get(
        'authors/{author:username}', function (User $author) {
            return view(
                'posts', [
                'posts' => $author->posts,
                'categories' => Category::all()
                ]
            );
        }
    );
