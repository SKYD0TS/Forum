@extends('dashboard.layouts.master')

@section('container')
    <div class="d-flex justify-content-between flex-wrap mt-2 mb-4 border-bottom">
        <h1>Post of, {{ auth()->user()->name }}</h1>
    </div>

    @if (session()->has('success'))
        <div class="w-50 mx-auto mt-4 alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success : </strong>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container mb-4">
        <a class="d-inline-block mb-4 btn btn-primary" href="/dashboard/posts/create?redirectIndex=0"><span
                class="align-text-bottom"data-feather='edit-2'></span>Create</a>
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
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->category->name }}</td>
                            <td>
                                <a class='px-2 badge bg-primary' href="/dashboard/posts/{{ $post->slug }}"><span
                                        data-feather='eye'></span></a>
                                <a class="px-2 badge bg-warning" href="/dashboard/posts/{{ $post->slug }}/edit"><span
                                        data-feather="edit-3"></span></a>
                                <form class="d-inline" action="/dashboard/posts/{{ $post->slug }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button class="px-2 badge bg-danger border-0" type="submit"
                                        onclick="return confirm('delete?');"><span data-feather='trash-2'></span></button>
                                </form>
                                {{-- <a class='' href="/dashboard/posts/"><span data-feather='trash-2'></span></a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
