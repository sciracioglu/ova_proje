<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BilgiMail extends Mailable
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
        if ($this->data['firma_mail'] && (filter_var($this->data['firma_mail'], FILTER_VALIDATE_EMAIL))){
        return $this->to($this->data['firma_mail'])
                    ->view('mail.firma.bilgi');
        }
    }
}
