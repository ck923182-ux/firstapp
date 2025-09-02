@vite('resources/css/app.css')

<a href="{{ route('blogs.create') }}">Add New Post</a>
<form method="GET" action="{{ route('blogs.index') }}">
    <input type="text" name="search" value="{{ request('search') }}" placeholder="Search blogs...">
    <button type="submit">Search</button>
</form>

@if ($blogs)
    <ul>
        @foreach ($blogs as $post)
            <li style="margin-top: 20px;">
                <p>Post Tile : <strong>{{ $post->title }}</strong>
                <p>Post Content <strong>{{ $post->content }}</strong></p>
                <p>Post Slug <strong>{{ $post->slug }}</strong></p>
                <p>Category: <strong> {{ $post->category->name ?? 'No Category' }} </strong></p>
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
    {{-- Pagination links ck--}}
    {{-- {{ $blogs->links() }} --}}
@else
    <table class="table-auto">
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Image</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blogs as $blog)
                <tr>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->category->name ?? 'No Category' }}</td>
                    <td>
                        @if ($blog->image)
                            <img src="{{ asset('storage/' . $blog->image) }}" width="80">
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Pagination links -->
    <div style="margin-top: 20px;">
        {{ $blogs->links('vendor.pagination.tailwind') }}
    </div>
@endif
