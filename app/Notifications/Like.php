<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Customer;


class Like extends Notification
{
    use Queueable;
    public $Customer;

    public function __construct( $Customer)
    {
        $this->Customer = $Customer;
    }
    public function via($notifiable)
    {
        return ['database'];
    }
    public function toDatabase($notifiable)
    {
        return [
            'customer_id'   => $this->Customer->id,
            'customer_phone' => $this->Customer->phone,
        ];
    }
}
