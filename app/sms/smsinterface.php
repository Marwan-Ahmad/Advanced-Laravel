<?php


namespace App\sms;

interface smsinterface
{
    public function sendsms(string $message);
}