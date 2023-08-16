<?php

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
Route::get(
    '/', function () {
        return view(
            'posts', [
                //
                // pass data through routes
                //
                'posts' => Post::latest()->get(),
                'categories' => Category::all()
            ]
        );
    }
)-> name('home');

    //
    // {post} is a variable called slug, and used in the callback function
    //
    Route::get(
        'posts/{post:slug}', function (Post $post) {
            //
            // Find a post by slug and pass it to a view called "post"

            return view(
                'post', [
                'post' => $post
                ]
            );
        }
    );


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
