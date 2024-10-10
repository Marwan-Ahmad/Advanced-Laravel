<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class apiscontroller extends Controller
{
    public function index(){
        $response=Http::get("https://www.tubepornstars.com/pornstar/dreddxxx");
        return response($response);
    }
}