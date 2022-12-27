@extends('master')
@section('title', $title)
@include('parts.navbar')
@section('content')

    @if (session()->has('loginError'))
        <div class="w-50 mx-auto mt-4 alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Login Error: </strong>Password or Username invalid.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    {{-- @isset($username)
        <div class="w-50 mx-auto mt-4 alert alert-success alert-dismissible fade show" role="alert">
            <strong>Uwwooggghh </strong>Loginn.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endisset --}}

    <div class="container mt-4 ">
        <h1 class="text-center">Welcome, </h1>
        <div class="container border rounded-2 mt-4">

            <form action="/login" method="post">
                {{ csrf_field() }}
                <label for="inputUsername5" class="form-label">Username</label>
                <input name='username' type="text" id="inputUsername5" class="form-control"
                    value="@isset($username) {{ $username }} @endisset {{ old('username') }}"
                    autofocus />
                {{-- @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror --}}

                <label for="inputPassword5" class="form-label">Password</label>
                <input name='password' type="password" id="inputPassword5" class="form-control" />

                <input class="w-50 btn btn-primary mt-2 d-block mx-auto" type="submit" value="Login" />
            </form>
        </div>
        <small class="text-center">Not registered?<a href="/register"> Register Now </a></small>
    </div>

@endsection
