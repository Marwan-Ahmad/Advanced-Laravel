<?php

namespace App\services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class userservices{
    public function createuser(array $data){

        $data['password']=Hash::make($data['password']);
        return User::query()->create($data);
    }
}