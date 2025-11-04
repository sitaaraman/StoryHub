<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TestMail;
use Mail;
class TestMailController extends Controller
{
    public function send(){
        $details = [
            'title' => "This is Title",
            'body' => "This is subject"
        ];
        Mail::to('vasubagasariya2@gmail.com')->send(new TestMail($details));
        return "Sent Successfully";
    }
}
