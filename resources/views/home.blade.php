@extends('layouts.app')

@section('content')
    <h1>All Posts</h1>

    @if (count($posts) > 0)
        @foreach ($posts as $post)
            <div>
                <h2><a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a></h2>
                <p>{{ $post->summary }}</p>
                <p>Posted by: {{ $post->user ? $post->user->name : 'Unknown' }}</p>
            </div>
        @endforeach
    @else
        <p>There are no posts available.</p>
    @endif
@endsection
