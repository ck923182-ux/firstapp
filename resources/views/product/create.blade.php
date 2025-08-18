<h1>Add Post</h1>
<form action="{{ route('product.store') }}" method="POST">
    @csrf
    <input type="text" name="title" placeholder="Title" required>
    <textarea name="content" placeholder="Content" required></textarea>
    <textarea name="prices" placeholder="Prices" required></textarea>
    <button type="submit">Save</button>
</form>
