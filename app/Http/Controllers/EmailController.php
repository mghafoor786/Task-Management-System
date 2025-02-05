<?php

namespace App\Http\Controllers;

use App\Mail\TaskEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    public function sendEmail(){
        $toEmail = "nanobhai45@gmail.com";
        $message = "Hello, Welcome to our Website";
        $subject = "Welcome to YahooBaba";

        // $request = Mail::to($toEmail)->send(new TaskEmail($message,$subject));
        $request = Mail::to($toEmail)->queue(new TaskEmail($message,$subject));


        dd($request);
    }
}
