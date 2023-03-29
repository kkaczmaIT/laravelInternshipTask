<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class ClientAddedEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $client_email;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($client_email, $user_id)
    {
        //
        $this->user = User::find($user_id);
        //dd($this->client);
        $this->client_email = $client_email;
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
