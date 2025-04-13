<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;
    public $member;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($member)
    {
        $this->member = $member;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
            ->subject('Pendaftaran Relawan Gibran Penerus Jokowi (GPJ)')
            ->view('mail.register_email', ['member' => $this->member])
            ->with(
                [
                    'nama' => config('app.name'),
                    'website' => 'www.gibranpenerusjokowi.com',
                ]);
    }
}
