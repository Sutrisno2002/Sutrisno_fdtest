<?php

namespace Modules\Front\Livewire;

use Livewire\Component;
use Modules\Common\Models\GuestMessage;
use Modules\Common\Traits\Utils\FlashMessage;

class ContactUs extends Component
{
    use FlashMessage;

    /**
     * Define string property
     * @var string
     */
    public ?string $name = '';
    public ?string $email = '';
    public ?string $whatsapp_number = '';
    public ?string $subject = '';
    public ?string $message = '';

    /**
     * Define validation rules
     * @var array
     */
    protected $rules = [
        'name' => 'required|regex:/^[a-zA-Z ]*$/|max:50',
        'email' => 'required|email|max:50',
        'whatsapp_number' => 'required|regex:/^[0-9]*$/|min:8|max:15',
        'subject' => 'required|max:100',
        'message' => 'required|max:500',
    ];

    /**
     * Define validation messages
     * @var array
     */
    protected $messages = [
        '*.required' => ':attribute tidak boleh kosong.',
        '*.email' => ':attribute tidak valid',
        'name.regex' => ':attribute hanya diperebolehkan huruf.',
        'whatsapp_number.regex' => ':attribute hanya diperebolehkan angka.',
        '*.max' => ':attribute maks. :max karakter.',
        '*.min' => ':attribute min. :min karakter.',
    ];

    /**
     * Define validation attribute aliases
     * @var array
     */
    protected $validationAttributes = [
        'name' => 'nama',
        'email' => 'email',
        'whatsapp_number' => 'no. whatsapp',
        'subject' => 'subjek',
        'message' => 'pesan',
    ];

    /**
     * Store guest question to database
     * @return void
     */
    public function sendMessage()
    {
        $this->validate();

        try {
            GuestMessage::create([
                'name' => $this->name,
                'email' => $this->email,
                'whatsapp_number' => $this->whatsapp_number,
                'subject' => $this->subject,
                'message' => $this->message,
            ]);

            $this->reset();

            return session()->flash('success', 'Pertanyaan Anda telah berhasil diterima. Kami akan segera memprosesnya dan memberikan tanggapan secepat mungkin. Terima kasih atas kepercayaan Anda.');
        } catch (Exception $exception) {
            return session()->flash('error', $exception->getMessage());
        }
    }

    public function render()
    {
        return view('front::livewire.contact-us');
    }
}
