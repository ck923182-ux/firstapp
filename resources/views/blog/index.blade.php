
    <a href="{{ route('blogs.create') }}">Add New Post</a>
    @foreach ($blog as $post) 
     <div class="bg-white dark:bg-gray-800 p-4 rounded shadow">
                <strong class="text-xl font-semibold">{{ $post->title }}</strong>
                <p>{{ $post->content }}</p>
                <p>{{ $post->slug }}</p>
                {{ $post->category ? $post->category->name : 'No Category' }}

                @if ($post->image)
                    <img src="{{ asset('storage/' . $post->image) }}" alt="Image for {{ $post->title }}" >
                @endif

                <div class="mt-3">
                    <a href="{{ route('blogs.edit', $post) }}" class="text-blue-500 hover:underline">Edit</a>
                    <form action="{{ route('blogs.destroy', $post) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline ml-2">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    