@extends('master')
@section('title',$title)

@include('parts.navbar')

<div class="row justify-content-center mt-4 mb-3">
    <div class="col-md-5">
        <form action="/posts" >
        <div class="input-group mb-3">
            <input class="form-control" type="text" name="search" placeholder="Search" value="{{request('search')}}">
            <button class="btn btn-outline-primary" type="submit">Search</button>
        </div>
        </form>
    </div>
</div>

<div class="container">
    <h2 class="mb-4">{{ $title }}</h2>
    <ul>
        @foreach($posts as $post)
        <article class="mb-4 border-bottom">
            <li>
                <h4><a href="/post/{{ $post->slug }}">{{ $post->title }}</a></h4>
                <p>{{ substr($post->content,0,100)."..." }} </p>
                <p><a href="/user/{{ $post->user->name }}">{{ $post->user->name }}</a>
                    in <a href="/category/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>
                </li>
        </article>
        @endforeach
    </ul>
</div>