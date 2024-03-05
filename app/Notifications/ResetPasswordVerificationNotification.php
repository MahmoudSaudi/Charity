<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Ichtrojan\Otp\Otp;

class ResetPasswordVerificationNotification extends Notification
{
    use Queueable;
    public $message;
    private $otp;
    public $subject;
    public $formEmail;
    public $mailer;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        $this->message = 'Use the below code for resetting your password';
        $this->mailer = 'smtp';
        $this->subject = 'Password resetting';
        $this->formEmail = 'saudimahmoud7878@gmail.com';
        $this->otp = new Otp;
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

        $otp = $this->otp->generate($notifiable->email,'numeric',6, 60);
        return (new MailMessage)
            ->mailer('smtp')
            ->greeting("Hello {$notifiable->first_name} welcome to my ApiTest project this is the first project whit api")
            ->subject($this->subject)
            ->line('Thank you for using our application!')
            ->line('code : '. $otp->token);
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
