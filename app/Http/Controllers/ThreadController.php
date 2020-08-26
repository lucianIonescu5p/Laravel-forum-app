<?php

namespace App\Http\Controllers;

use App\Post;
use App\Thread;

use App\User;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    public function show (Request $request)
    {
        $thread = Thread::with(['posts', 'user'])->where('title', $request->thread)->first();
        $user = User::where('id', $thread->user_id)->first();
        $posts = Post::with('user')->where('thread_id', $thread->getKey())->get();

        return view('thread', compact(['thread', 'user', 'posts']));
    }
}
