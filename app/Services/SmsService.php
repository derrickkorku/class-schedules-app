<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;

class SmsService
{
    public function send(string $phone, string $message){
        Log::info("Sending Sms to {$phone} with message {$message}");
    }
}
