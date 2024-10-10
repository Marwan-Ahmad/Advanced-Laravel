<?php

namespace App\sms;



class jamilsms extends merosms{

    public function sendsms(string $message){
                return response()->json([
                    'message'=>$message
                ]);
            }
}







// class jamilsms implements smsinterface
// {
//     public function sendsms(){
//         return response()->json([
//             'message'=>'send jamil sms'
//         ]);
//     }
// }