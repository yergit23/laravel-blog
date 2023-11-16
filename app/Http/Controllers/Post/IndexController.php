<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;

class IndexController extends Controller
{
    public function __invoke()
    {
        $posts = Post::paginate(6);
        $randomPosts = Post::get()->random(4);
        $likedPosts = Post::withCount('likedUsers')->orderBy('liked_users_count', 'DESC')->get()->take(4);
        $categories = Category::all();

        return view('post.index', compact('posts', 'randomPosts', 'likedPosts', 'categories'));
    }
}
