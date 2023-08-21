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



    public function create()
    {
        return view('posts.create');
    }



    public function store()
    {
        // validate the inputs and set $attributes
        $attributes = request()->validate(
            [
            'title' => ['required'],
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'excerpt' => ['required'],
            'body' => ['required'],
            'category_id' => ['required', Rule::exists('categories', 'id')],
            ]
        );

        $attributes['user_id'] = auth()->id();

        // store in db
        Post::create($attributes);

        return redirect('/');
    }
}
