<h1>index </h1>
{{-- {{$category}} --}}
<div>
    <a href="{{ route('categories.create') }}">Add New Post</a>
    @foreach ($category as $item)
        <p> {{ $item->name }}</p>
        <a href="{{ route('categories.edit', $item) }}">Edit</a>
        <form action="{{ route('categories.destroy', $item) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    @endforeach
</div>
