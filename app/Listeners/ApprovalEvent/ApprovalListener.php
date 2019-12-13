<?php

namespace App\Listeners\ApprovalEvent;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApprovalMail;
use App\Mail\RejectedMail;

use App\Events\ApprovalEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ApprovalListener
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
     * @param  ApprovalEvent  $event
     * @return void
     */
    public function handle(ApprovalEvent $event)
    {
        // dd($event->applier->status);
        // $updated_status = $event->applier->status;
        if ( $event->applier->status == "Approved"){
            Mail::to($event->applier->email)->send(new ApprovalMail($event->applier,$event->schedule));
        }
        elseif ( $event->applier->status == "Rejected"){
            Mail::to($event->applier->email)->send(new RejectedMail($event->applier));
        }
        
    }
}
