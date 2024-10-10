<?php

namespace App\Request\user;

use App\Request\baserequest;

class createuservladation extends baserequest{

    public function rules(): array
    {
        return [
            'name'=>'required|max:50',
            'email'=>['required','min:5','max:50','email','unique:users'],
            'password'=>'required|min:5|confirmed'
        ];
    }

    public function authorized(): bool
    {
        return true;
    }
}