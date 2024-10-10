<?php

namespace App\Http\Controllers\api;

use App\Mail\emailmailable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class Emailcontroller extends Basecontroller
{
    public function send(){
        Mail::to('ahmdmrwan47@gmail.com')->send(new emailmailable(Auth::user()));

        return $this->sendresponse('done');
    }
}