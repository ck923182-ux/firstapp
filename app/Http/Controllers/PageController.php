<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function aboutt()
    {
        $name = "Saurabh Behl";
        $profession = "Web Developer";
        $location = "India";

        return view('about', [
            'name' => $name,
            'profession' => $profession,
            'location' => $location
        ]);
    }
}
