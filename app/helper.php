<?php
use Illuminate\Support\Facades\Lang;

function trnsl($key){

    if(!Lang::hasForLocale('string.'.$key,app()->getLocale())){
        return $key;
    }
    return __('string.'.$key);

}
