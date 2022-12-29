@extends('dashboard.layouts.master')

@section('container')
<div class="d-flex justify-content-between flex-wrap mt-2 border-bottom">
    <h1>Write a Post</h1>
</div>

<div class="col-lg-8 mb-5">
    <form method="POST" action="/dashboard/posts">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input autofocus name="title" type="text" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title') }}">
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" readonly value="{{ old('slug') }}">
            @error('slug')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select name="category_id" id="category" class="form-select @error('category') is-invalid @enderror">
                @foreach($categories as $cat)
                    @if(old('category_id')==$cat->id)
                        <option value="{{ $cat->id }}" selected>{{ $cat->name }}</option>
                    @else
                        <option value="{{ $cat->id }}" >{{ $cat->name }}</option>
                    @endif
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <div class="text-danger">FILE BUTTON HAS YET TO BE REMOVED</div>
            <input id="x" type="hidden"  name="content" value="{{ old('content') }}">
            <trix-editor class="@error('title') is-invalid @enderror" input="x"></trix-editor>
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
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
