<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sendsmscontroller extends Controller
{
    public function send(){
        $basic=new \Vonage\Client\Credentials\Basic("be754580","1jG8YaF3skn5rhpp");
        $client=new \Vonage\Client($basic);

        $message=$client->sms()->send(
            new \Vonage\SMS\Message\SMS(
                '+9630938156382',
                'hamed',
                'welcome my bro',

            )
            );
            return response()->json([
                'send SMS'
            ]);
    }
}
