<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewOpinion extends Mailable
{
    use Queueable, SerializesModels;

    public $msg;
    public $greeting;
    public $words;

    /**
     * Create a new message instance.
     *
     * @return void
     */


    public function __construct($greeting,$words,$msg,)
    {

        $this->greeting = $greeting;

        $this->words = $words;

        $this->msg = $msg;


    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.newOpinion');
    }
}
