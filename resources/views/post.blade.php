@extends('master')
@section('title', $post['postTitle'])

@include('parts.navbar')

@section('content')
    <div class="container d-flex flex-column  align-items-center mt-4">
        @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="">
        @else
            <img src="https://source.unsplash.com/960x400?{{ $post->category->name }}" alt="">
        @endif
        <hr>
        <div class="body d-flex flex-column align-items-start">

            <h4>{{ $post->title }} </h4>
            <p>{!! $post->content !!} </p>
            <p><a href="/posts?={{ $post->user->name }}">{{ $post->user->name }}</a>
                in <a href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></p>

            <a href="/posts">Back to posts</a>
        </div>
    </div>

@endsection
