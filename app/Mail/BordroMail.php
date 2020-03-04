<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BordroMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    public $uid;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, string $uid)
    {
        $this->data = $data;
        $this->uid = $uid;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->data->EPOSTA && (filter_var($this->data->EPOSTA, FILTER_VALIDATE_EMAIL))) {
            return $this->to($this->data->EPOSTA)
                        ->subject($this->data->BORDRO_YIL . ' Yılı ' . $this->data->BORDRO_AY. '. Ay Bordronuz')
                        ->view('mail.bordro.bilgi');
        }
    }
}
