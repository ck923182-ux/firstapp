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
            'email'=> "eresarlll@gmail.com",
            'password' => Hash::make('har')
        ]);
        SendWelcomeEmail::dispatch($user->email, $user->name);
        return "Job Dispatched With Minutes dealy data";
    }
}
