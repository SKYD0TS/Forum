@extends('master')
@section('title',$title)

@include('parts.navbar')

@section('content')
<div class="container-fluid ">
    <h2>Login</h2><br>
    <form action="/login" method="post">
        <label for="username">Username</label><input id="username" type="text">
        <label for="password">Password</label><input id="password" type="password">
        <input type="submit" value="Login">
    </form>
</div>

@endsection