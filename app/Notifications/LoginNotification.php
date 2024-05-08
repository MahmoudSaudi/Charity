<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class LoginNotification extends Notification
{
    use Queueable;
    public $message;
    public $subject;
    public $formEmail;
    public $mailer;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        $this->message ='You just logged in ';
        $this->subject ='New logging in ';
        $this->formEmail ='saudimahmoud7878@gmail.com';
        $this->mailer ='smtp';
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->mailer('smtp')
                    ->greeting("Hello {$notifiable->first_name} welcome to my ApiTest project this is the first project whit api")
                    ->subject($this->subject)
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
