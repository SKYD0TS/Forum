<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Models\UserPost;
use Illuminate\Http\Request;

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
        $postid = Post::where('slug', $postslug)->first()->id;
        
        $res['postslug'] = $postslug;

        $the = UserPost::where('user_id', auth()->user()->id)
        ->where('post_id', $postid)->first();

        
        if ($the) {
            $the->delete();
            $res['likes'] =  $the->sum('val');
            return response($res);

            
        } else{
            $new = [
                'user_id' => auth()->user()->id,
                'post_id' => $postid,
            ];
            
            if ($vote == 'dislike') {
                $new['val'] = -1;
            } else if ($vote == 'like') {
                $new['val'] = 1;
            }
        }
        UserPost::create($new);
        $p = Post::find($postid);
        $res['likes'] = $p->like->sum('val');
        return response($res);
    }

    // public function likeDislike(Request $res)
    // {
    //     $the = UserPost::where('user_id', auth()->user()->id)
    //         ->where('post_id', $res->postid)->first();

    //         // return $the==null;
    //     if ($the) {
    //         $the->delete();
    //         return redirect('/posts');

            
    //     } else{

    //         $new = [
    //             'user_id' => auth()->user()->id,
    //             'post_id' => $res->postid,
    //         ];
            
    //         if ($res->dislike) {
    //             $new['val'] = -1;
    //         } else if ($res->like) {
    //             $new['val'] = 1;
    //         }
    //     }
            
    //     UserPost::create($new);
    //     return redirect('/posts');
    // }
}