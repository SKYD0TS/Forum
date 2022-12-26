@extends('master')
@section('title',$post['postTitle'])

@include('parts.navbar')

@section('content')
<div class="container">
    <h4>{{ $post->title }} </h4>
    <p>{{ $post->content }} </p>
    <p><a href="/user/{{ $post->user->name }}">{{ $post->user->name }}</a>
    in <a href="/category/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>
    
    <a href="/posts">Back to posts</a>
</div>

@endsection