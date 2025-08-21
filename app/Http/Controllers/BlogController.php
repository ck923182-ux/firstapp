<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\author;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    public function index()
    {
        $blog = Blog::all();
        return view('blog.index', compact('blog'));
    }

    public function create()
    {
        $categories = Category::all();
        $author = author::all();
        return view('blog.create', compact('categories' ,'author'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'slug' => 'required',
            'category_id' => 'required|exists:categories,id',
            'author_id' => 'required|exists:author,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imagePath = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            Storage::makeDirectory('/images');
            Storage::putFileAs('/images', $image, $imageName);
            $imagePath = 'images/' . $imageName;
        }

        Blog::create([
            'title' => $request->title,
            'content' => $request->content,
            'slug' => $request->slug,
            'image' => $imagePath,
            'category_id' => $request->category_id, // save the selected category
            'author_id' => $request->author_id, // save the selected category
        ]);

        return redirect('/blogs')->with('success', 'Post created successfully!');
    }


    public function show(string $id)
    {
        // Not implemented yet
    }

    public function edit(Blog $blog)
    {
        $categories = \App\Models\Category::all();
        return view('blog.edit', compact('blog', 'categories'));
    }


    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|string',
            'slug' => 'required|string',
            'content' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $blog->title = $request->title;
        $blog->slug = $request->slug;
        $blog->content = $request->content;

        if ($request->hasFile('image')) {
            // Optionally delete old image
            // if ($blog->image && \Storage::exists('public/' . $blog->image)) {
            //     \Storage::delete('public/' . $blog->image);
            // }

            $path = $request->file('image')->store('blogs', 'public');
            // dd($path);
            $blog->image = $path;
        }

        $blog->save();

        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully.');
    }


    public function destroy(Blog $blog)
    {
        // dd($blog);
        $blog->delete();

        return redirect('/blogs')->with('success', 'Post deleted successfully!');
    }
}
