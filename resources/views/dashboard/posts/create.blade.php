@extends('dashboard.layouts.master')

@section('container')
<div class="d-flex justify-content-between flex-wrap mt-2 border-bottom">
    <h1>Write a Post</h1>
</div>

<div class="col-lg-8">
    <form method="POST" action="/dashboard/post">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="email" class="form-control" id="title">
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control" id="slug" value="">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script type="text/javascript">
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change',function(){
        fetch('/dashboard/posts/checkSlug?title='+title.value)
        .then(response=>response.json)
        .then(data=>slug.value = data.slug)
    })
</script>

@endsection