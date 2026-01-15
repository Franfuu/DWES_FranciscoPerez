<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
   $posts = Post::published()->get(); // Fetch only published posts using the scope
    return view('posts.index', compact('posts')); // Pass the posts to the view
});
//route for all posts
Route::get('/all', function () {
    $posts = Post::all(); // Fetch all posts
    return view('posts.index', compact('posts')); // Pass the posts to the view
});