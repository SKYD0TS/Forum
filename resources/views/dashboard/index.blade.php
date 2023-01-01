@extends('dashboard.layouts.master')

@section('container')
    <div class="d-flex justify-content-between flex-wrap mb-4 border-bottom">
        <h1>Welcome, {{ auth()->user()->name }}</h1>
    </div>
@endsection
