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
    <h2 class="mb-4">{{ $title }}</h2>
    <ul>
        @foreach ($posts as $post)
            <article class="mb-4 border-bottom">
                <li>
                    <h4><a href="/post/{{ $post->slug }}">{{ $post->title }}</a></h4> {{-- title --}}
                    <p>{{ substr($post->content, 0, 100) . '...' }} </p> {{-- excerpt --}}
                    <p><a href="/posts?user={{ $post->user->username }}">{{ $post->user->name }}</a>
                        {{-- user --}}
                        in <a href="/posts?category={{ $post->category->slug }}">
                            {{ $post->category->name }}</a></p>{{-- category --}}
                </li>
            </article>
        @endforeach
    </ul>
    <div class="mb-5 fixed-bottom d-flex justify-content-center">
        {{ $posts->links() }}
    </div>
</div>
