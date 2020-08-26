<?php

namespace App\Http\Controllers;

use App\Category;
use App\Thread;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index ()
    {
        $categories = Category::with('threads')->simplePaginate(5);

        return view('welcome', compact('categories'));
    }

    public function show (Request $request)
    {
        $threads = Thread::with(['categories', 'posts'])
            ->whereHas('categories', function ($q) use ($request) {
                return $q->where('title', $request->category);
            })
            ->simplePaginate(5);

        $category = $request->category;

        return view('category', compact('threads', 'category'));
    }
}
