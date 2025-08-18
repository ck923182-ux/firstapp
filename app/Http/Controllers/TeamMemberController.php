<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TeamMember;

class TeamMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = TeamMember::all();
        return view("teammember.index", compact("teams"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("teammember.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        TeamMember::create([
            "name" => $request->name,
            "position" => $request->position,
            "bio" => $request->bio,
        ]);
        return redirect("/team");
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
    public function edit(TeamMember $team)
    {
        return view("teammember.edit", compact("team"));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TeamMember $team)
    {
        //  dd($request);
        $team->update([
            "name" => $request->name,
            "position" => $request->position,
            "bio" => $request->bio,
        ]);

        return redirect('/team');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TeamMember $team)
    {
        $team->delete();
        return redirect('/team');
    }
}
