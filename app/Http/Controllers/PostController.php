<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;

class PostController extends Controller
{

    public function index()
    {
        return view(
            'posts.index', [
                'posts' => Post::latest()
                    ->filter(request(['search', 'category', 'author']))
                    ->get(),
            ]
        );
    }

    public function show(Post $post): View
    {
        return view(
            'posts.show', [
            'post' => $post
            ]
        );
    }
}
