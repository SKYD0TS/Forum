<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Facades\Storage;



class DashboardPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard/posts/index', [
            'posts' => Post::where('user_id', auth()->user()->id)->orderBy('created_at', 'DESC')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create', [
            'categories' => Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $the)
    {
        // return $the->file('image')->store('post-images');

        $validatedData = $the->validate([
            'title' => 'required|max:255',
            'slug' => 'required|unique:posts',
            'image' => 'image|file|max:1024',
            'category_id' => 'required',
            'content' => 'required'
        ]);

        if ($the->file('image')) {
            $validatedData['image'] = $the->file('image')->store('post-images');
        }

        $validatedData['user_id'] = auth()->user()->id;

        // $validatedData['excerpt'] = substr($the->content,0,100);

        $validatedData['excerpt'] = Str::limit(strip_tags($the->content), 200);

        Post::create($validatedData);
        if ($the->redirectIndex == 0)
            return redirect('/dashboard/posts')->with('success', 'New Post');
        else
            return redirect('/posts')->with('success', 'New Post');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('dashboard.posts.show', ['post' => $post]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('dashboard.posts.edit', [
            'post' => $post,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $the, Post $post)
    {
        $rules = ([
            'title' => 'required|max:255',
            'category_id' => 'required',
            'image' => 'image|file|max:1024',
            'content' => 'required'
        ]);

        if ($the->slug != $post->slug) {
            $rules['slug'] = 'required|unique:posts';
        }

        $validatedData = $the->validate($rules);

        $validatedData['user_id'] = auth()->user()->id;
        // $validatedData['excerpt'] = substr($the->content,0,100);

        if ($the->file('image')) {
            if ($post->image) Storage::delete($post->image);

            $validatedData['image'] = $the->file('image')->store('post-images');
        }


        @$validatedData['excerpt'] = Str::limit(strip_tags($the->content), 200);

        Post::where('id', $post->id)->update($validatedData);
        return redirect('/dashboard/posts')->with('success', 'Updated Post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if ($post->image) Storage::delete($post->image);
        Post::destroy($post->id);
        return redirect('/dashboard/posts')->with('success', 'Post Deleted');
    }

    public function checkSlug(Request $req)
    {

        $slug = SlugService::createSlug(Post::class, 'slug', $req->title);
        return response()->json(['slug' => $slug]);
    }
}