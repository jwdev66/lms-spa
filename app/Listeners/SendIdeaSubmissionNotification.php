<?php

namespace App\Listeners;

use App\Events\IdeaSubmitted;
use App\Mail\IdeaSubmissionEmail;
use Illuminate\Support\Facades\Mail;

class SendIdeaSubmissionNotification
{


    public function __construct()
    {
        //
    }


    public function handle(IdeaSubmitted $event)
    {
        logger('Sending mail    ::EventListener');
        $user = $event->user;
        $user->notify(new \App\Notifications\IdeaSubmitted($event->idea));

    }
}
