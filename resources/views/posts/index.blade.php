<h1>All Posts</h1>
<a href="{{ route('posts.create') }}">Add New Post</a>

<ul>
    @foreach($posts as $post)
        <li>
            <strong>{{ $post->title }}</strong>
            <p>{{ $post->content }}</p>

            <a href="{{ route('posts.edit', $post) }}">Edit</a>
            
            <form action="{{ route('posts.destroy', $post) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
