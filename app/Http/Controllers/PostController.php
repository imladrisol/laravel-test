<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    public function create()
    {
        return view('posts.create', ['categories' => Category::all()]);
    }

    public function store()
    {
        $attrs = request()->validate([
            'title' => 'required',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'body' => 'required',
            'thumbnail' => 'required|image',
            'excerpt' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);
        $attrs['user_id'] = auth()->user()->id;
        $attrs['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        Post::create($attrs);
        return redirect('/');
    }
}
