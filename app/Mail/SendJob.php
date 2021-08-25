<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendJob extends Mailable
{
    use Queueable, SerializesModels;
  
    public $message = false;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        //
      $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if($this->message['cv'] != null){
          
          return $this->markdown('emails.job')->subject('Email new job')
                ->attach($this->message['cv']->getRealPath(),
                [
                    'as' => $this->message['cv']->getClientOriginalName(),
                    'mime' => $this->message['cv']->getClientMimeType(),
                ]);
        }
        else{
          return $this->markdown('emails.job');
        }
    }
}