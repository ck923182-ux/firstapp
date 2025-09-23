
{{-- @extends('layouts.navigation') --}}
@extends('layouts.app')
@section('content')
@can('create-blogs')
    <h1><a href="{{ route('blogs.create') }}">Add Blog</a></h1>
@endcan

<form method="GET" action="{{ route('blogs.index') }}">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search blogs...">
    <button type="submit">Search</button>
</form>

@if ($blogs->count() > 0)
    <ul>
        @foreach ($blogs as $post)
            <li style="margin-top: 20px;">
                <p>Post Title: <strong>{{ $post->title }}</strong></p>
                <p>Post Content: <strong>{{ $post->content }}</strong></p>
                <p>Category: <strong>{{ $post->category->name ?? 'No Category' }}</strong></p>

                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Image for {{ $post->title }}" width="300">
                @endif

                <a href="{{ route('blogs.edit', $post) }}">Edit</a>
                <form action="{{ route('blogs.destroy', $post) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>

    {{-- Pagination --}}
    {{-- <div class="mt-6">
    {{ $blogs->links() }} --}}
</div>

@else
    <p>No blog posts found.</p>
@endif
<div class="text-4xl text-red-500 font-bold text-center mt-10">
    Tailwind is working!
</div>
@endsection
