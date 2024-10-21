@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <h1>Edit Post</h1>
    <a href="{{ route('posts.index') }}" class="btn btn-primary">Back</a>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @else

    @endif
    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') ?? $post->title }}">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control">{{ old('content') ?? $post->content }}</textarea>
        </div>
        <div class="form-group">
            <label for="category">Category</label>
            <select name="category_id" class="form-control">
                <option value="">Choose</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ (old('category_id') ?? $post->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="image">Upload Image</label>
            <input type="file" name="image" class="form-control">
        </div>
        <div class="form-check">
            <input type="hidden" name="is_published" value="0">
            <input type="checkbox" name="is_published" class="form-check-input" value="1"
                   {{ old('is_published', $post->is_published ?? false) ? 'checked' : '' }}>
            <label for="isPublished" class="form-check-label">Publish</label>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>

@endsection
