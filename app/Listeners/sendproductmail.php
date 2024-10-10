<?php

namespace App\Listeners;

use App\Events\newproductevent;
use App\Mail\productmailable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class sendproductmail
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(newproductevent $event): void
    {
        Mail::to('ahmdmrwan47@gmail.com')->send(new productmailable($event->user,$event->product));
    }
}