<h1>All Prodcut</h1>
<a href="{{ route('product.create') }}">Add New prodcut</a>

<ul>
    @foreach($prod as $post)
        <li>
            <strong>{{ $post->title }}</strong>
            <p>{{ $post->description }}</p>

            <a href="{{ route('product.edit', $post) }}">Edit</a>
            
            <form action="{{ route('product.destroy', $post) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </li>
    @endforeach
</ul>
