@extends('layouts.app')

@section('title', 'Edit Category')

@section('content')
    <h1>Edit Category</h1>
    <a href="{{ route('categories.index') }}" class="btn btn-primary">Back</a>
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
    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') ?? $category->name }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="{{ old('description') ?? $category->description }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
