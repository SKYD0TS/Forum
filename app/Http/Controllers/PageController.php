<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Models\UserPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{

    public function allPosts()
    {
        $header = 'Posts';
        $title = 'Posts';
        if (request('category')) {
            $category = Category::firstWhere('slug', request('category'));
            $header = 'All Posts In ' . $category->name;
        } elseif (request('user')) {
            $user = User::firstWhere('username', request('user'));
            $header = 'All Posts By ' . $user->name;
        }


        return view('posts', [
            'title' => $title,
            'header' => $header,
            'posts' => Post::latest()->Filter(request(['category', 'search', 'user']))->paginate(8)->withQueryString()
        ]);
    }

    public function viewPost(Post $title)
    {
        return view('post', [
            'post' => $title->load(['category', 'user', 'like']),
            'title' => 'Post',

        ]);
    }

    public function byCategory(Category $category)
    {
        return view('posts', [
            'title' => 'Posts In ' . $category->name,
            'posts' => $category->posts->load('category', 'user', 'like')

        ]);
    }

    public function byUser(User $user)
    {
        return view('posts', [
            'title' => 'Posts By : ' . $user->name,
            'posts' => $user->posts->load('category', 'user', 'like')

        ]);
    }

    public function vote(Request $res){
        
        $postslug = $res->input('postslug');
        $vote = $res->input('vote');
        $post = Post::where('slug', $postslug)->first();
        
        $res['postslug'] = $postslug;
        $like = UserPost::where('user_id', Auth::id())
            ->where('post_id', $post->id)->first();

        if($like){
            $like->delete();
            $res['likes'] =  Post::find($post->id)->like->sum('val');
            return response($res);

        }else{
            $new = [
                'user_id' => Auth::id(),
                'post_id' => $post->id,
            ];
                
            $new['val'] = $vote=='like'? 1:-1;
            UserPost::create($new);
        }

        $res['likes'] =  Post::find($post->id)->like->sum('val');
        return response($res);
    }
}