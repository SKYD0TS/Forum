@extends('dashboard.layouts.master')

@section('container')
<div class="d-flex justify-content-between flex-wrap mt-2 border-bottom">
    <h1>Posts of, {{ auth()->user()->name }}</h1>
</div>
<div class="container acts">
    <button class="mt-4 btn btn-success" href="/dashboard/posts"><span  class="align-text-bottom" data-feather="arrow-left"></span> Back to posts</button>
    <button class="mt-4 btn btn-warning" href="/dashboard/posts/edit"><span  class="align-text-bottom" data-feather="edit-3"></span> Back to posts</button>
    <button class="mt-4 btn btn-danger" href="/dashboard/posts"><span  class="align-text-bottom" data-feather="trash-2"></span> Delete</button>
</div>

<div class="container mt-4">

    <h3>{{ $post->title }} </h3>
    <p>{{ $post->content }} </p>

    <p><a href="/posts?={{ $post->user->name }}">{{ $post->user->name }}</a>
        in <a href="/posts?category={{ $post->category->slug }}">{{ $post->category->name }}</a></p>

</div>
@endsection