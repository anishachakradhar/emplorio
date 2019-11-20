<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RejectedMail extends Mailable
{
    use Queueable, SerializesModels;
    public $applier;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($applier)
    {
        $this->applier = $applier;
        $this->email =$applier->email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('SEND_MAIL_ADDRESS'))->to($this->email)->view('mail.rejected_mail');
    }
}
