<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class ChartDataUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        return [
            new Channel('statistik'),
        ];
    }
    public function broadcastWith()
    {
        return [
            "data" => $this->data
        ];
    }
    public function broadcastWhen(){
        // Hanya broadcast jika ada perubahan data
        // Misalnya dengan membandingkan total count
        $newTotal = $this->data['total']['count'];
        $lastTotal = session('last_total', 0); // Menyimpan total lama dalam session

        // Update session dengan total baru
        session(['last_total' => $newTotal]);

        // Jika total baru berbeda dari yang terakhir, broadcast event
        // return $newTotal != $lastTotal;
        return true;
    }
}
