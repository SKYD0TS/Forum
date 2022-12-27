@extends('dashboard.layouts.master')

@section('container')
<div class="d-flex justify-content-between flex-wrap mt-2 mb-4 border-bottom">
    <h1>Post of, {{ auth()->user()->name }}</h1>
</div>
<div class="container mb-4">
    <a href="/dashboard/posts/create"><button class="btn btn-primary"><span class="align-text-bottom" data-feather='edit-3'></span>Create</button></a>
</div>
<div class="container">

    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post) 
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->category->name}}</td>
                    <td>
                        <a class='px-2 badge bg-primary' href="/dashboard/posts/{{$post->slug}}"><span data-feather='eye'></span></a>
                        <a class='px-2 badge bg-warning' href="/dashboard/posts/"><span data-feather='edit'></span></a>
                        <a class='px-2 badge bg-danger' href="/dashboard/posts/"><span data-feather='trash-2'></span></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection