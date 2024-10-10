<?php

namespace App\sms;




class merosms implements smsinterface
{
    public function sendsms(string $message){
                return response()->json([
                    'message'=>$message
                ]);
            }
}








// class merosms implements smsinterface
// {
//     public function sendsms(){
//         return response()->json([
//             'message'=>'send mero sms'
//         ]);
//     }
// }