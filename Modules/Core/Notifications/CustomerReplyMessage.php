<?php

namespace Modules\Core\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;

class CustomerReplyMessage extends VerifyEmail
{
    use Queueable;

    /**
     * Define mix props
     *
     * @var mix
     */
    protected $guestEmail;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($guestEmail)
    {
        $this->guestEmail = $guestEmail;
    }

    /**
     * Route notifications for the mail channel.
     *
     * @return string
     */
    public function routeNotificationForMail($notifiable)
    {
        return $this->guestEmail;
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->markdown('notifications::email')
            ->subject($notifiable->subject)
            ->greeting('Halo, ' . $notifiable->name . '!')
            ->line($notifiable->message)
            // ->line('Dengan memverifikasi email, Anda akan mendapatkan akses ke layanan kami, termasuk fitur-fitur terbaru, update berkala, dan dukungan pelanggan. Jika Anda tidak merasa melakukan pendaftaran ini, abaikan email ini.')
            // ->action('Verifikasi Email', $verificationUrl)
            ->line('Untuk informasi lebih lanjut tentang layanan kami, silakan kunjungi situs web kami atau hubungi kami [disini](' . route('front.contact') . ').')
            ->salutation('Salam hangat, <br/> **' . cache('app_name') . '**');
    }
}
