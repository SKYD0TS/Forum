<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('login', ['title' => 'Login']);
    }

    public function allPosts()
    {

        return view('posts', [
            'title' => 'Posts',
            'posts' => Post::latest()->searchFilter(request(['search']))->get()
        ]);
    }

    public function viewPost(Post $title)
    {
        return view('post', [
            'post' => $title->load(['category', 'user']),
            'title' => 'Post',

        ]);
    }

    public function byCategory(Category $category)
    {
        return view('posts', [
            'title' => 'Posts In ' . $category->name,
            'posts' => $category->posts->load('category', 'user')

        ]);
    }

    public function byUser(User $user)
    {
        return view('posts', [
            'title' => 'Posts By : ' . $user->name,
            'posts' => $user->posts->load('category', 'user')

        ]);
    }
}