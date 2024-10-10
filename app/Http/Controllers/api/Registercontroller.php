<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Requests\user\loginrequest;
use App\Request\user\createuservladation;
use App\Request\user\loginrequest as UserLoginrequest;
use App\services\userservices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Registercontroller extends BaseController
{
    public $userservice;

    public function __construct(userservices $userservice)
    {
        $this->userservice=$userservice;
    }

    public function register(createuservladation $request)
    {
        if(!empty($request->getErrors())){
            return $this->sendresponse([],$request->getErrors(),406);
        }

        $user=$this->userservice->createuser($request->request()->all());
        $message['user']=$user;
        $message['token']=$user->createToken('myapp')->plainTextToken;



        return $this->sendresponse($message);

    }

    public function login(UserLoginrequest $request){

        if(!empty($request->getErrors())){
            return $this->sendresponse([],$request->getErrors(),406);
        }
        $request1=$request->request();
        if(Auth::attempt(['email'=>$request1->email,'password'=>$request1->password])){
            $user=Auth::user();
            $success['username']= $user->name;
            $success['usermail']= $user->email;
            $success['token']= $user->createToken('api')->plainTextToken;

            return $this->sendresponse($success,'user login successfuly');
        }
        else{
            return $this->sendresponse([],'unauth',406);
        }
    }
}
