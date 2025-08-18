<h1>Testing Index Page</h1>

<ul>
    @foreach ($prof as $post)
        <li>
            <strong>{{ $post->name }}</strong>
            <p>{{ $post->address }}</p>
            <p>{{ $post->City }}</p>
            <p>{{ $post->country }}</p>
            <p>{{ $post->type }}</p>

            <a href="{{ route('profile.edit', $post) }}">Edit</a>

            <form action="{{ route('service.destroy', $post) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
