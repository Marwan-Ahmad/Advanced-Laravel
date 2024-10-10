<?php

namespace App\Http\Controllers;

use App\sms\jamilsms;
use App\sms\merosms;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class lspcontroller extends Controller
{
    public function sms(jamilsms $message){
        return  $message->sendsms('jamil');
    }



    public function pdf(){

        $pdf = Pdf::loadView('welcome',[]);
        return $pdf->download('chart.pdf');
    }

}