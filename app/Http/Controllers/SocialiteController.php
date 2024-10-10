<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirectTogoogle(){
        return Socialite::driver("google")->redirect();
    }

    public function handleGoogleCallback(){
        try{
            $user=Socialite::driver("google")->user();
            $finduser=User::where("social_id",$user->id)->first();
            if($finduser){
                Auth::login($finduser);
                return response()->json([
                    $finduser
                ]);
            }else{
                $newUser=User::create([
                    "name"=> $user->name,
                    "email"=> $user->email,
                    "password"=> Hash::make('my-google'),
                    "social_id"=> $user->id,
                    "social_type"=> 'google',
                ]);

                Auth::login($newUser);

                return response()->json([
                    $newUser
                ]);
            }
        }
        catch(\Exception $exception){
            dd($exception->getMessage());
        }
    }
}