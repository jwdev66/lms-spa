<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

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
        return ['database', 'broadcast'];
//        return ['mail'];
//        return $notifiable->preferredNotificationChannels();
    }

    public function toMail($notifiable)
    {
        return (new MailMessage())
                    ->line('Alpha has submitted an idea.')
                    ->action('Check it out', url('/'))
                    ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
            'id'          => $this->idea->id,
            'title'       => $this->idea->title,
            'description' => $this->idea->description,
        ];
    }

    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'id'          => $this->idea->id,
            'title'       => $this->idea->title,
            'description' => $this->idea->description,
        ]);
    }
}
