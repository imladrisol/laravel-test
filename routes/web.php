<?php

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    DB::listen(function ($query) {
        logger($query->sql, $query->bindings);//storage->logs->laravel.log -it will be 3 queries for categories
    });

    return view('posts', [
        'posts' => Post::all()
    ]);
});

Route::get('post/{post}', function (Post $post) {
    return view('post', [
        'post' => $post
    ]);
});

Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts' => $category->posts
    ]);
});
