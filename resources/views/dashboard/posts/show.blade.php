@extends('dashboard.layouts.master')

@section('container')
    <div class="d-flex justify-content-between flex-wrap mt-2 border-bottom">
        <h1>Posts of, {{ auth()->user()->name }}</h1>
    </div>
    <div class="container acts">
        <a class="mt-4 btn btn-primary" href="/dashboard/posts"><span class="align-text-bottom"
                data-feather="arrow-left"></span> Back to posts</a>
        <a class="mt-4 btn btn-warning" href="/dashboard/posts/{{ $post->slug }}/edit"><span class="align-text-bottom"
                data-feather="edit-3"></span> Edit Post</a>
        <form class="d-inline" action="/dashboard/posts/{{ $post->slug }}" method="POST">
            @method('delete')
            @csrf
            <button class="mt-4 btn btn-danger border-0" type="submit" onclick="return confirm('delete?');"><span
                    class="align-text-bottom" data-feather='trash-2'></span>Delete Post</button>
        </form>
    </div>

    <div class="container mt-4">

        @if ($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="">
        @else
            <img src="https://source.unsplash.com/960x400?{{ $post->category->name }}" alt="">
        @endif
        <h3>{{ $post->title }} </h3>
        <p>{!! $post->content !!} </p>

    </div>
@endsection
