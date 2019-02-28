<?php

namespace App\Http\Controllers;
use Mail;
use session;
use Illuminate\Http\Request;

class mailController extends Controller
{
    public function index(){
      return view('mails/send');  
    }

    public function send(Request $request){
      
        $this->validate($request,[
           'name'=>'required',
           'email'=>'required|email',
           'message'=>'required'   
        ]);

Mail::send('mails.message',[
          'msg'=>$request->message,
            ], function($mail) use($request){ 
                $mail->from($request->email,$request->name);
                $mail->to('canadajun1972@gmail.com')->subject('test');
            });
            return redirect()->back()->with('flash_message','Email Sent');
      }
  }
