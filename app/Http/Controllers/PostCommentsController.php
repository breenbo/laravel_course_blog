<?php

namespace App\Http\Controllers;

use App\Models\Post;


class PostCommentsController extends Controller
{

    public function store(Post $post)
    {
        //
        // validate the input
        //
        request()->validate(
            [
            'body' => 'required'
            ]
        );
        //
        // store the input in db, depending on the post of the comment
        //
        $post->comments()->create(
            [
                // post_id got from relationship $post->comment()
                // comment from logged in user
                'user_id' => auth()->id(),
                'body' => request('body')
            ]
        );
        //
        // route to previous page
        //
        return back();

    }
}
