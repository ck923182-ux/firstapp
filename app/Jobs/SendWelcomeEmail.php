<?php

// namespace App\Jobs;

// use Illuminate\Contracts\Queue\ShouldQueue;
// use Illuminate\Foundation\Queue\Queueable;

// class SendWelcomeEmail implements ShouldQueue
// {
//     use Queueable;

//     /**
//      * Create a new job instance.
//      */
//     public function __construct()
//     {
//         //
//     }

//     /**
//      * Execute the job.
//      */
//     public function handle(): void
//     {
//         //
//     }
// }

namespace App\Jobs;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use App\Models\User;


class SendWelcomeEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $email ,$name;

    public function __construct($email, $name)
    {
        $this->email = $email;
        $this->name = $name;
            // $this->username = $username;

    }

    public function handle(): void
    {
        // simulate email sending
        // Log::info('Queue Job Executed Successfully');
        // Log::info("Welcome user Name: " . $this->name);
        // Log::info("Welcome user Email: " . $this->email);
         Mail::to('test@mailtrap.io')
        ->send(new WelcomeMail($this->email));
        throw new \Exception("Testing failed job");
//         if(User::where('email',$this->email)->exists()){
//        throw new \Exception("User already exists");
//    }
    }
}
