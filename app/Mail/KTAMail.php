<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class KTAMail extends Mailable
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
            ->subject('Kartu Tanda Anggota (KTA) Relawan Gibran Penerus Jokowi')
            ->view('mail.kta_email', ['member' => $this->member])
            ->with(
                [
                    'nama' => config('app.name'),
                    'website' => 'www.gibranpenerusjokowi.com',
                ])
            ->attach(public_path('kta/' . $this->member->member_number) . '/' . $this->member->member_number . '_kta.pdf');
    }
}
