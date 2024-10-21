@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <h1>Categories</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-2">Create Category</a>
    <div class="list-group">
        @if (count($categories) >= 0)
            @foreach ($categories as $category)
            <div class="list-group-item justify-content-between align-items-center d-flex">
                <a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a>
                <div>
                    <a href="{{route('categories.edit', $category->id)}}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{route('categories.destroy', $category->id)}}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </div>
            @endforeach
        @else
            <div class="list-group-item justify-content-between align-items-center">
                No Data
            </div>
        @endif
    </div>
@endsection
