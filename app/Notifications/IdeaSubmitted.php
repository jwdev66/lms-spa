<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class IdeaSubmitted extends Notification
{
    use Queueable;

    public $idea;

    public function __construct($idea)
    {
        $this->idea = $idea;
    }

    public function via($notifiable)
    {
        return ['database'];
//        return ['mail'];
//        return $notifiable->preferredNotificationChannels();
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('Alpha has submitted an idea.')
                    ->action('Check it out', url('/'))
                    ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
            'Alpha has submitted an idea titled' . $this->idea->title,
        ];
    }


}
