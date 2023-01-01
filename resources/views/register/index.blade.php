@extends('master')
@section('title', $title)
@include('parts.navbar')
@section('content')
    <div class="container mt-4 w-75">
        <div class="container border rounded-2 mt-4">
            <h1 class="text-center mt-2">Register</h1>

            <form action="/register" method="post">
                {{ csrf_field() }}
                <label for="inputName5" class="form-label">Name</label>
                <input type="text" name='name' id="inputName5" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name') }}" />
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <label for="inputUsername5" class="form-label">Username</label>
                <input type="text" name='username' id="inputUsername5"
                    class="form-control @error('username')is-invalid @enderror" value="{{ old('username') }}" />
                @error('username')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <label for="inputEmail5" class="form-label">Email</label>
                <input type="text" name='email' id="inputEmail5"
                    class="form-control @error('email')is-invalid @enderror" value="{{ old('email') }}" />
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror

                <label for="inputPassword5" class="form-label">Password</label>
                <input type="password" name='password' id="inputPassword5"
                    class="form-control @error('password')is-invalid @enderror" />
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror


                <input class="w-50 btn btn-primary mt-4 d-block mx-auto" type="submit" value="Register" />
            </form>
        </div>
        <small>Registered? <a href="/login">Login Now</a></small>
    </div>

@endsection
