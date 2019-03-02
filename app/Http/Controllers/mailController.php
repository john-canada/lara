<?php

namespace App\Http\Controllers;
use Mail;
Use App\Mail\sendmail;
use session;
use Illuminate\Http\Request;

class mailController extends Controller
{
    public function index(){
      return view('mails/send');  
    }

    public function send(Request $request){
      
        $this->validate($request,[
           'email'=>'required|email',
           'subject'=>'required',
           'message'=>'required'   
        ]);

        $email=$request->email;
        $subject=$request->subject;
        $message=$request->message;

Mail::to($email)->send(new sendmail($subject,$message));

      }
  }
