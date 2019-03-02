<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendmail extends Mailable
{

    use Queueable, SerializesModels;

    public $sub;
    public $mess;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subject, $message)
    {
        $this->sub = $subject;
        $this->mess = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $e_subject = $this->sub;
        $e_message = $this->mess;

        return $this->view('mails.sendmail',compact('e_message'))->subject($e_subject);
    }
}
