<?php

namespace App\Listeners;

use App\Events\IdeaSubmitted;
use App\Mail\IdeaSubmissionEmail;
use Illuminate\Contracts\Mail\Mailer;

class SendIdeaSubmissionNotification
{
    protected $mailer;


    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }


    public function handle(IdeaSubmitted $event)
    {
        $this->mailer->send(new IdeaSubmissionEmail($event->user, $event->idea));
    }
}
