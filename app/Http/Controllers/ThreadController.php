<?php

namespace App\Http\Controllers;

use App\Post;
use App\Thread;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ThreadController extends Controller
{
    public function show (Request $request)
    {
        $thread = Thread::with(['posts', 'user'])->where('title', $request->thread)->first();
        $user = User::where('id', $thread->user_id)->first();
        $posts = Post::with('user')->where('thread_id', $thread->getKey())->orderBy('created_at', 'desc')->paginate(2);

        return view('thread', compact(['thread', 'user', 'posts']));
    }

    public function store (Thread $thread, Request $request)
    {
        $request->validate([
            'thread' => 'required|unique:title',
            'description' => 'required'
        ]);

        $thread->title = $request->input('thread');
        $thread->description = $request->input('description');
        $thread->save();

        return back();
    }
}
