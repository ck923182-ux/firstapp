<?php

namespace App\Http\Controllers;

use App\Models\profile;
use Illuminate\Http\Request;

class userProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prof = profile::all();
        return view("profile.index", compact("prof"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("profile.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        profile::create([
            "name" => $request->name,
            "address" => $request->Address,
            "city" => $request->city,
            "country" => $request->country,
            "type" => $request->type,
        ]);
       return redirect("/profile");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( profile $profile)
    {
        return view("profile.edit" , compact("profile"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, profile $profile)
    {
         //  dd($request);
        $profile->update([
            "name" => $request->name,
            "position" => $request->position,
            "bio" => $request->bio,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
