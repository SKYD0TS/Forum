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
            <input type="text" name="slug" class="form-control" id="slug" disabled readonly value="">
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select id="category" class="form-select" aria-label="Default select example">
                @foreach($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <div class="text-danger">FILE BUTTON HAS YET TO BE REMOVED</div>
            <trix-editor></trix-editor>
            <div class="text-danger">SUBMIT HAS YET TO BE FUNCTION</div>
        </div>

        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

    


<script>
    const title = document.querySelector('#title')
    const slug = document.querySelector('#slug')

    title.addEventListener('change',function(){
        fetch('/dashboard/post/checkSlug?title=' + title.value)
        .then((response)=>response.json())
        .then((data)=>slug.value = data.slug);
    })

    document.addEventListener('trix-file-accept',function(e){
        e.preventDefault()
    })
</script>

@endsection
