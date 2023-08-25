<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Validation\Rule;

class PostController extends Controller
{


    public function index()
    {
        return view(
            'posts.index', [
                'posts' => Post::latest()
                    ->filter(request(['search', 'category', 'author']))
                    // paginate the results, and add existing filtering in queries
                    ->paginate(6)
                    ->withQueryString(),
            ]
        );
    }



    public function show(Post $post): View
    {
        return view(
            'posts.show', [
                'post' => $post,
            ]
        );
    }



}
