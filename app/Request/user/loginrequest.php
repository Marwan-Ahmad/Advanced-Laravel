<?php

namespace App\Request\user;

use App\Request\baserequest;
use Illuminate\Foundation\Http\FormRequest;

class loginrequest extends baserequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email'=>'required|email|min:5',
            'password'=>'required|min:5|max:50'
        ];
    }
}