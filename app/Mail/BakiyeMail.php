<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BakiyeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->data->EMAIL5 && (filter_var($this->data->EMAIL5, FILTER_VALIDATE_EMAIL))){
        return $this->to($this->data->EMAIL5)
                        ->subject($this->data->SIRKETAD.' Bakiye Mütabakat')
                        ->view('mail.bakiye.bilgi');
        }
    }
}
