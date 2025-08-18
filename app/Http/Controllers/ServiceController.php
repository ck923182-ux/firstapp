<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $serv = Service::all();
        return view('service.index', compact('serv'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        // $status = $request->has('status') ? 1 : 0;
        Service::create([
            'title' => $request->title,
            'details' => $request->details,
            'status' => $request->status,
        ]);
        return redirect('/service');
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
    public function edit(Service $service)
    {
        return view('service.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
        //  dd($request);
         $service->update([
            'title' => $request->title,
            'details' => $request->details,
            'status' => $request->status,
        ]);

        return redirect('/service');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
         $service->delete();
        return redirect('/service');
    }
}
