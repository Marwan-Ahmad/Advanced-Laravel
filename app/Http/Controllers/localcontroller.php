<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;

class localcontroller extends Controller
{
    public function  change($lang){
        FacadesSession::put("lang", $lang);
        return redirect("/");
    }
}
