<?php
namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewOccupationEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $occupation;

    public function __construct($occupation)
    {
        $this->occupation = $occupation;
    }

    // Tentukan channel broadcasting
    public function broadcastOn()
    {
        return new Channel('occupation-channel');
    }

    // Data yang di-broadcast
    public function broadcastWith()
    {
        return [
            'title' => $this->occupation->title,
            'company' => $this->occupation->company,
            'location' => $this->occupation->location,
        ];
    }
}
