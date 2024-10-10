<?php

namespace App\Http\Controllers;

use App\sms\smsinterface;
use Illuminate\Http\Request;

class smscontroller extends Controller
{
    protected $sms;
    public function __construct(smsinterface $sms){
        $this->sms = $sms;
    }

     public function send(){
        return $this->sms->sendsms('mero');
     }
}