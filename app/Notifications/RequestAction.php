<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\RequestApproval;

class RequestAction extends Notification
{
    use Queueable;
    public $request;
    public $url;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(RequestApproval $requestApproval, $_url)
    {
        $this->request = $requestApproval->request;
        $this->url = $_url;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->greeting('Dengan Hormat')
                    ->subject($this->request->title)
                    ->line("Permintaan Data")
                    ->line($this->request->created_at)
                    ->line($this->request->user->name . "(". $this->request->user->id .")")
                    ->line($this->request->title)
                    ->line($this->request->status->name)
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
