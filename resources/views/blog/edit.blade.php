
<H1>Edit Blog</H1>

<form action="{{ route("blogs.update" , $blog) }}" enctype="multipart/form-data" method="POST">
@csrf
@method('PUT')
{{$blog}}
{{-- {{$blog->content}} --}}
<input type="text" name="title" placeholder="Title" value="{{$blog->title}}" required>
    <textarea name="content" placeholder="Content"  required>{{$blog->content}} </textarea>
    <input type="text" name="slug" placeholder="Slug" value="{{$blog->slug}}" required></input>

    {{-- Show existing image --}}
    @if($blog->image)
        <div>
            <p>Current Image:</p>
            <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" width="150">
        </div>
    @endif  
        <input type="file" name="image">

      <button type="submit">Save</button>

</form>