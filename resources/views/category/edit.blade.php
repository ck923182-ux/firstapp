<h1>Edit Post</h1>
<form action="{{ route('categories.update', $category) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{ $category->name }}" required>
    <button type="submit">Update</button>
</form>
