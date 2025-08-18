<h1>Add Category</h1>
<form action="{{ route('categories.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Title" required>
    
    <button type="submit">Save</button>
</form>