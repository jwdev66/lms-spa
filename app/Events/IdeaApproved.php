<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class IdeaApproved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $idea;
    public $user;

    public function __construct($user, $idea)
    {
        $this->user = $user;
        $this->idea = $idea;
    }

}
