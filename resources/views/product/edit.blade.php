<h1>Edit product</h1>
<form action="{{ route('product.update', $product) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="text" name="title" value="{{ $product->title }}" required>
    <textarea name="content" required>{{ $product->content }}</textarea>
    <textarea name="prices" required>{{ $product->prices }}</textarea>
    <button type="submit">Update</button>
</form>
