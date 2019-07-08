<?php

namespace App\Listeners;

use App\Events\IdeaApproved;
use App\Notifications\IdeaSubmitted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendIdeaApprovedNotification implements ShouldQueue
{
    use InteractsWithQueue;

    public function __construct()
    {
        //
    }

    public function handle(IdeaApproved $event)
    {
        // Trigger notification
        $event->user->notify(new IdeaSubmitted($event->idea));
    }
}
