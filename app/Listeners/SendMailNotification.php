<?php

namespace App\Listeners;

use App\Events\userRegistered;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;
class SendMailNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  userRegistered  $event
     * @return void
     */
    public function handle(userRegistered $event)
    {
        
    $data = array(
        'name'=>$event->user->name,
        'email'=>$event->user->email,
        'body'=>'Welcome to out website'
    );

    Mail::send('mails.userEmail', $data , function($message)use($data){
       $message->to($data['email'])
               ->subject('Welcome to our site');
       $message->from('canadajun1972@gmail.com');
    });
  }
}
