<h1>

    this is a Edit blade file
</h1>

<h1>Update Author Details</h1>
@if ($errors->any())
    <div class="alert alert-danger">

        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach

    </div>
@endif
{{-- {{$author}} --}}
<form action="{{ route('author.update' ,$author) }}"method="POST">
    @csrf
    @method("PUT")
    <input type="text" name="authorname" value="{{ $author->name }}" required>
    <input type="text" name="bio" value="{{ $author->bio }}" required>
    <button type="submit">Update</button>
</form>
