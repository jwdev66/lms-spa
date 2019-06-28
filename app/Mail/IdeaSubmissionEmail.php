<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class IdeaSubmissionEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $user;
    public $idea;

    public function __construct($user, $idea)
    {
        $this->user = $user;
        $this->idea = $idea;
    }


    public function build()
    {
        return $this->view('emails.ideaSubmission');
    }
}
