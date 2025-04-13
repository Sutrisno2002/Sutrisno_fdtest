<?php

namespace Modules\Administrator\Models;

use Illuminate\Notifications\Notifiable;
use Modules\Core\Notifications\CustomerReplyMessage;

class Guest
{
    use Notifiable;

    /**
     * Define string props
     *
     * @var string
     */
    protected string $email;
    public string $name;
    public string $subject;
    public string $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     *
     * @param string $email
     * @param string $name
     * @param string $subject
     * @param string $message
     */
    public function __construct($email, $name, $subject, $message)
    {
        $this->email = $email;
        $this->name = $name;
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * Route notifications for the mail channel.
     *
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return string
     */
    public function routeNotificationForMail($notification)
    {
        return $this->email;
    }

    /**
     * Send email notification to guest
     *
     * @return Illuminate\Notifications\Notifiable
     */
    public function sendEmail(){
        $this->notify(new CustomerReplyMessage($this->email));
    }

}
