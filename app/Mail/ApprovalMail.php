<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApprovalMail extends Mailable
{
    use Queueable, SerializesModels;
    public $applier;
    public $interview_date;
    public $interview_time;
    public $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($applier,$schedule)
    {
        $this->applier = $applier;
        $this->interview_date = $schedule->interview_date;
        $this->interview_time = $schedule->interview_time;
        $this->email =$applier->email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // dd($this->schedule);
        return $this->from(env('SEND_MAIL_ADDRESS'))->to($this->email)->view('mail.approved_mail');
    }
}
