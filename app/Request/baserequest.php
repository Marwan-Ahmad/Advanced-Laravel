<?php

namespace App\Request;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator as FacadesValidator;

abstract class baserequest
{
    protected $_request;

    private $status=true;

    private $errors=[];

    abstract public function rules(): array;


    public function __construct(Request $request=null ,$forcedelet=true)
    {
        if(!is_null($request)){
            $this->_request=$request;
            $rules=$this->rules();

            $vlaidator=FacadesValidator::make($request->all(),$rules);
            if($vlaidator->fails()){
                if($forcedelet){
                    $this->status=false;
                    $this->errors=$vlaidator->errors()->toArray();

                }else{
                    $this->status=false;
                    $this->errors=$vlaidator->errors()->toArray();
                }
            }
        }
    }


    public function isstatus():bool
    {
        return $this->status;
    }


    public function getErrors(): array
    {
        return $this->errors;
    }

    public function request(){
        return $this->_request;
    }

}