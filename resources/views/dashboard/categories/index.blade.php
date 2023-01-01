@extends('dashboard.layouts.master')

@section('container')
    <div class="d-flex justify-content-between flex-wrap mb-4 border-bottom">
        <h1>Welcome, {{ auth()->user()->name }}</h1>
    </div>


    <div class="container">
        <div class="table-responsive col-md-5">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a class='px-2 badge bg-primary' href="/dashboard/posts/{{ $category->slug }}"><span
                                        data-feather='eye'></span></a>
                                <a class="px-2 badge bg-warning" href="/dashboard/posts/{{ $category->slug }}/edit"><span
                                        data-feather="edit-3"></span></a>
                                <form class="d-inline" action="/dashboard/posts/{{ $category->slug }}" method="POST">
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
