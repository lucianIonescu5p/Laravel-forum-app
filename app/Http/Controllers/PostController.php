<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function store (Post $post, Request $request)
    {
        $request->validate([
           'message' => 'required'
        ]);

        $post->content = $request->input('message');
        $post->thread_id = $request->input('thread_id');
        $post->user_id = Auth::user()->id;
        $post->save();

        return back();
    }
}
