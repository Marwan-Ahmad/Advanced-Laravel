<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Srmklive\PayPal\Facades\PayPal;
use Srmklive\PayPal\Services\ExpressCheckout;

class paypalecontroller extends Controller
{
    public function payment(){
        $data=[];

        $data["items"] = [
            [
                'name'=>'subscribe to channel',
                'price'=>1000,
                'desc'=>'descriotion',
                'qty'=>2
            ],
            [
                'name'=> 'make like',
                'price'=> 300,
                'desc'=> 'description',
                'qty'=> 2
            ]
        ];

        $data['invoice_id'] = 1;
        $data['invoice_description'] = "Order #{$data['invoice_id']} Invoice";
        $data["return_url"] = "http://127.0.0.1:8000/payment/success";
        $data["cancel_url"] = "http://127.0.0.1:8000/cancel";
        $data["total"] = 2600;


        $provider=new ExpressCheckout;

        $respone=$provider->setExpressCheckout($data,true);


        return redirect($respone['paypal_link']);


    }

    public function success(Request $request){
        $provider=new ExpressCheckout;

        //return $provider;
        $response=$provider->getExpressCheckoutDetails($request->token);
       // return $response;
      if(in_array(strtoupper($response['ACK']),['SUCCESS','SUCCESSWITHWARNING'])){
        //approve payment
        return response()->json('paid success');

      }
      // cancel
       return response()->json('payment fail',402);

    }

    public function cancel(){
        //cancel
        return response()->json('payment cancelled',402);

    }
}