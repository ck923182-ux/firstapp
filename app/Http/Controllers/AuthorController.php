<?php

namespace App\Http\Controllers;

use App\Models\author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $author = author::all();
        return  view('author.index', compact("author"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('author.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'authorname' => ['required', 'regex:/^[A-Za-z\s]+$/', 'max:255'],//used string "jon","jon nixon" but not work any number 123 
            'bio' => 'required|string',
        ]);
        // Create a new instance of your model and save the data
        author::create([
            'name' => $request->authorname,
            'bio' => $request->bio,
        ]);
        // Redirect or return a response after successful submission
        return redirect()->route('author.index')->with('success', 'Record created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(author $author)
    {
         return view('author.edit' , compact('author'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, author $author)
    {
          $request->validate([
            'authorname' => 'required|string',
            'bio' => 'required|string',
        ]);

        $author->name = $request->authorname;
        $author->bio = $request->bio;
        
         $author->save();

        return redirect()->route('author.index')->with('success', 'Author updated successfully.');
        }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(author $author)
    {
        $author->delete();
        return redirect()->route('author.index')->with('success', 'author deleted successfully!');

    }
}
