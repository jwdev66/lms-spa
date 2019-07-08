<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class IdeaSubmitted
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $idea;

    public function __construct($user, $idea)
    {
        $this->user = $user;
        $this->idea = $idea;
    }
}
