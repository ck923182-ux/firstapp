<H1>Edit Blog</H1>
@if ($errors->any())
    <div class="alert alert-danger">

        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach

    </div>
@endif
<form action="{{ route('blogs.update', $blog) }}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('PUT')

    {{-- {{$blog->content}} --}}
    <input type="text" name="title" placeholder="Title" value="{{ $blog->title }}" required>
    <textarea name="content" placeholder="Content" required>{{ $blog->content }} </textarea>
    <input type="text" name="slug" placeholder="Slug" value="{{ $blog->slug }}" required></input>
    {{-- {{$author}} --}}
    
     <label for="author_id">Author</label>
    <select name="author_id" required>
        <option value="">-- Select Author --</option>
          @foreach ($author as $auth)
            <option value="{{ $auth->id }}"
                {{ old('author_id', $blog->author_id ?? '') == $auth->id ? 'selected' : '' }}>
                {{ $auth->name }}
            </option>
        @endforeach
        
    </select>
    {{-- Show existing image --}}
    @if ($blog->image)
        <div>
            <p>Current Image:</p>
            <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" width="150">
        </div>
    @endif
    <input type="file" name="image">

    <button type="submit">Save</button>

</form>
