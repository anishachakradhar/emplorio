<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ApprovalEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $applier;
    public $updated_status;
    public $schedule;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($applier,$schedule)
    {
        $this->applier = $applier;
        $this->schedule = $schedule;
        // $this->updated_status = $updated_status;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
