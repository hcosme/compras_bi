<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
// use App\Mail\SendMail;


class SendEmailController extends Controller
{
    function send(Request $request) {
        $this->validate($request, [
            'name'      => 'requiered',
            'email'     => 'requiered',
            'message'   => 'requiered'
            ]);
        
    }
    
}
