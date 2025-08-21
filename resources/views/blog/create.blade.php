<form action="{{ route('blogs.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="title" placeholder="Title" required>
    <textarea name="content" placeholder="Content" required></textarea>
    <textarea name="slug" placeholder="Slug" required></textarea>
    <input type="file" name="image">
    <label for="category_id">Category</label>
    {{-- {{$categories}} --}}
    <select name="category_id" required>
        <option value="">-- Select Category --</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                {{ old('category_id', $blog->category_id ?? '') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    {{-- {{$author}} --}}
    <label for="author_id">Category</label>
    <select name="author_id" required>
        <option value="">-- Select Author --</option>
          @foreach ($author as $auth)
            <option value="{{ $auth->id }}"
                {{ old('author_id', $blog->author_id ?? '') == $auth->id ? 'selected' : '' }}>
                {{ $auth->name }}
            </option>
        @endforeach
        
    </select>

    <button type="submit">Save</button>
</form>
