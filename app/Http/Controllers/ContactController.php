<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmailRequest;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function sendEmail(EmailRequest $request){
        if($request->input('btnEmail')){
            $email=$request->input('email');
            $subject=$request->input('subject');
            $message=$request->input('message');


            if(mail('david.carevic.159.14@ict.edu.rs',$subject,$message,'From:'.$email)) {
                return back()->with('success', 'Your email was sent!');
            }
            else{
                return back()->with('error','The email could not be sent.');
            }
        }

    }
}
