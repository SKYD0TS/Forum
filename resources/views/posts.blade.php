@extends('master')
@section('title', $title)

@include('parts.navbar')

<div class="mt-4 col-md-5 mx-auto">
    <form class="justify-content-center" action="/posts">
        <div class="input-group mb-3">
            @if (request('category'))
                <input type="text" name="category" hidden value={{ request('category') }}>
            @endif
            @if (request('user'))
                <input type="text" name="user" hidden value={{ request('user') }}>
            @endif
            <input class="form-control" type="text" name="search" placeholder="Search"
                value="{{ request('search') }}">
            <button class="btn btn-outline-primary" type="submit">Search</button>
        </div>
    </form>
</div>

<div class="container">

    @if (session()->has('success'))
        <div class="w-50 mx-auto mt-4 alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success : </strong>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <h2 class="mb-4">{{ $title }}</h2>
    <a class="d-inline-block mb-4 btn btn-primary" href="/dashboard/posts/create?redirectIndex=1"><span
            class="align-text-bottom"data-feather='edit-2'></span>Create</a>
    <div class="d-flex flex-row flex-wrap">
        @foreach ($posts as $post)
            {{--  --}}
            <div class="card mx-2 my-2" style="width: 18rem;">
                @if ($post->image)
                    <img class="mx-1 my-1 rounded-top" src="{{ asset('storage/' . $post->image) }}" alt="">
                @else
                    <img class="mx-1 my-1 rounded-top"
                        src="https://source.unsplash.com/720x360?{{ $post->category->name }}" alt="">
                @endif

                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>

                    <h6 class="card-subtitle mb-2 ">
                        <a class="text-decoration-none" href="/posts?user={{ $post->user->username }}">
                            {{ $post->user->username }}</a>
                        <span class="text-muted">in</span>
                        <a class="text-decoration-none" href="/posts?category={{ $post->category->slug }}">
                            {{ $post->category->name }}</a>
                    </h6>

                    <p class="card-text">{{ $post->excerpt }}</p>
                    <div class="p-0 container">
                        <a href="/post/{{ $post->slug }}" class="btn btn-primary">Read More</a>

                            <button class="border-0" data-postslug='{{$post->slug}}' data-vote="like" value="vote"><span
                                    data-feather="arrow-up-circle"></span></button>

                            <button class="border-0" data-postslug='{{$post->slug}}' data-vote="dislike" value="vote"> <span
                                    data-feather="arrow-down-circle"></span></button>

                    </div>
                    <p id="voteCount" postslug='{{$post->slug}}' class="mt-2">{{ $post->like->sum('val') }}</p>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mb-5 mt-5 d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script src="js/voteajax.js"></script>
