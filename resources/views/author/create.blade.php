<h1>

    this is a create blade file
</h1>

<h1>Add Author</h1>
@if ($errors->any())
    <div class="alert alert-danger">

        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach

    </div>
@endif
<form action="{{ route('author.store') }}"method="POST">
    @csrf
    <label for="authorname">Author Name</label>
    <input type="text" name="authorname" placeholder="Author Name" required>
    <label for="Author Bio">Bio</label>
    <input type="text" name="bio" placeholder="Author Bio" required>

    <button type="submit">Save</button>
</form>
