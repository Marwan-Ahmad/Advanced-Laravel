<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Basecontroller extends Controller
{
    public function sendresponse($response,$status='success',$code=200){
        return response()->json(['data'=>$response,'status'=>$status],$code);
    }
}