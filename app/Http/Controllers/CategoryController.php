<?php

namespace App\Http\Controllers;

use App\Category;
use App\Thread;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index ()
    {
        $user = null;

        if (Auth::check()) {
            $user = Auth::user();
            session(['isAdmin' => $user->role]);
        }

        $categories = Category::with('threads')->paginate(4);

        return view('welcome', compact('categories', 'user'));
    }

    public function show (Request $request)
    {
        $threads = Thread::with(['categories', 'posts'])
            ->whereHas('categories', function ($q) use ($request) {
                return $q->where('title', $request->category);
            })
            ->paginate(4);

        $category = $request->category;

        return view('category', compact('threads', 'category'));
    }

    public function store (Category $category, Request $request)
    {
        $request->validate([
           'category' => 'required|unique:title',
           'description' => 'required'
        ]);

        $category->title = $request->input('category');
        $category->description = $request->input('description');
        $category->save();

        return back();
    }
}
