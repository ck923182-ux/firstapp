<?php

namespace App\Http\Controllers;

use App\Jobs\SendWelcomeEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;


use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QueueTestController extends Controller
{
    public function test()
    {
        $user = User::create([
            'name' => "har",
            'email'=> "priyanka122@gmail.com",
            'password' => Hash::make('har')
        ]);
        SendWelcomeEmail::dispatch($user->email, $user->name)->delay(Carbon::now()->addMinute(2));
        return "Job Dispatched With 2 Minutes dealy data";
    }
}
