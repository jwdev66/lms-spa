<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

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
