<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;

class Maincontroller extends Controller
{
    public function chart(){
        $chart_options=[
            "chart_title"=> "Users by day",
            "report_type"=> "group_by_string",
            "model"=> "App\Models\User",
            "group_by_field"=> "email",
            "group_by_period"=> "day",
            "chart_type"=> "bar",
        ];

        $chart1=new LaravelChart($chart_options);

        return view('chart',compact('chart1'));
    }

}
