<h1>
    All Author
</h1>
<a href="{{ route('author.create') }}">Add New Author</a>
@foreach ($author as $auth)
    <p> Author Name : <strong>{{ $auth->name }}</strong> </p>
    <p> Author Bio <strong>{{ $auth->bio }}</strong></p>
    <p> <a href="{{ route('author.edit', $auth) }}">Edit</a></p>
    <form action="{{ route('author.destroy', $author) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit">Delete</button>
    </form>
@endforeach
