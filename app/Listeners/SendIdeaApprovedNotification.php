<?php

namespace App\Listeners;

use App\Events\IdeaApproved;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendIdeaApprovedNotification implements ShouldQueue
{
    use InteractsWithQueue;


    public function __construct()
    {
        //
    }

    
    public function handle(IdeaApproved $event)
    {
        //
    }
}
