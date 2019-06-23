<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class IdeaSubmissionEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    protected $idea;

    public function __construct($user, $idea)
    {
        $this->user = $user;
        $this->idea = $idea;
    }


    public function build()
    {
        return $this->view('view.name');
    }
}
