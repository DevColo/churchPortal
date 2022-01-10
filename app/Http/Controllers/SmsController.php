<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;

class SmsController extends Controller
{
    public function sendMessage(){
        Nexmo::message()->send([
            'to'   => '231778143376',
            'from' => '16105552344',
            'text' => 'Using the facade to send a message.'
        ]);
        echo "Message sent successfully";
       }
}
