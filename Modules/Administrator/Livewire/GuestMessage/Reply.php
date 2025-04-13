<?php

namespace Modules\Administrator\Livewire\GuestMessage;

use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\RoutesNotifications;
use Livewire\Component;
use Modules\Administrator\Models\Guest;
use Modules\Common\Contracts\WithModal;
use Modules\Common\Models\Category;
use Modules\Common\Models\GuestMessage;
use Modules\Common\Traits\Utils\FlashMessage;
use Modules\Core\Notifications\CustomerReplyMessage;

class Reply extends Component
{
    use WithModal, FlashMessage, Queueable;

    /**
     * Define category props
     * @var Category $guestmessage
     */
    public GuestMessage $guestmessage;

    /**
     * Define string props
     * @var string
     */
    public ?string $gallery_id = '';
    public ?string $email = '';
    public ?string $subject = '';
    public ?string $reply = '';
    public ?string $name = '';
    public ?string $group = 'courses';
    public ?string $pluckCategories = '';

    /**
     * Define int props
     * @var int
     */
    public ?int $guestmessage_id = null;
    public ?int $sort_order = null;

    /**
     * Define bool props
     * @var bool
     */
    public ?bool $status = true;
    public ?bool $is_featured = false;
    public ?bool $replied = false;

    /**
     * Set validation rules
     *
     * @var array
     */
    protected function rules()
    {
        return [
            'email' => 'required|max:191,id' . $this->guestmessage_id . ',id',
            'subject' => 'required|max:191',
            'reply' => 'required',
        ];
    }

    /**
     * Set validation messages
     *
     * @var array
     */
    protected $messages = [
        '*.required' => ':attribute tidak boleh kosong',
        '*.email' => 'format :email tidak sesuai',
        '*.min' => 'form :attribute min. :min karakter',
        '*.max' => 'form :attribute maks. :max karakter',
        'name.regex' => 'format :attribute tidak diperbolehkan. :attribute hanya diperbolehkan huruf.',
        'price.regex' => 'format :attribute tidak diperbolehkan. :attribute hanya diperbolehkan angka.',
    ];

    /**
     * Set validation attributes name
     *
     * @var array
     */
    protected $validationAttributes = [
        'email' => 'email',
        'subject' => 'subject',
        'reply' => 'reply',
    ];

    /**
     * Define livewire event listeners
     * @var array
     */
    protected $listeners = [
        'reply',
        'replied',
        self::INIT_MODAL,
        self::CLOSE_MODAL,
    ];

    /**
     * Define props value before component rendered
     *
     * @return void
     */
    public function mount(GuestMessage $guestmessage)
    {
        $this->reply = $guestmessage->reply;
    }

    /**
     * Livewire hook for replied event
     *
     * @param  int|null $id
     * @return void
     */
    public function replied(?int $id)
    {
        $this->replied = true;

        try {
            $guestmessage = GuestMessage::find($id);

            if (!$guestmessage) {
                throw new Exception('Kategori tidak ditemukan, kategori gagal dimuat.');
            }

            $this->guestmessage = $guestmessage;
            $this->guestmessage_id = $guestmessage->id;
            $this->email = $guestmessage->email;
            $this->subject = '[SOC Software House Support] Re: ' . $guestmessage->subject;
            $this->name = $guestmessage->name;
            $this->reply = $guestmessage->reply;
            $this->loading = false;
        } catch (Exception $exception) {
            $this->loading = false;
            return $this->dispatchError($exception->getMessage());
        }
    }

    /**
     * Livewire hook for reply event
     *
     * @param  int|null $id
     * @return void
     */
    public function reply(?int $id)
    {
        try {
            $guestmessage = GuestMessage::find($id);

            if (!$guestmessage) {
                throw new Exception('Kategori tidak ditemukan, kategori gagal dimuat.');
            }

            $this->guestmessage = $guestmessage;
            $this->guestmessage_id = $guestmessage->id;
            $this->email = $guestmessage->email;
            $this->subject = '[SOC Software House Support] Re: ' . $guestmessage->subject;
            $this->name = $guestmessage->name;
            $this->loading = false;

        } catch (Exception $exception) {
            $this->loading = false;
            return $this->dispatchError($exception->getMessage());
        }
    }

    /**
     * Update guest_message data to database
     *
     * @return void
     */
    public function update()
    {
        $this->validate();

        $mail = [
            'subject' => $this->subject,
            'name' => $this->name,
            'message' => $this->reply,
        ];

        $data = [
            'reply' => $this->reply,
        ];

        $mailMessage = (new CustomerReplyMessage($this->email));
        $guest = (new Guest($this->email, $this->name, $this->subject, $this->reply))->sendEmail();

        try {
            $guestmessage = GuestMessage::find($this->guestmessage_id);
            $guestmessage->update($data);
            $this->reset();
            return $this->dispatchSuccess('Pesan berhasil dikirim.');
        } catch (Exception $exception) {
            return $this->dispatchError($exception->getMessage());
        }
    }

    /**
     * Render the view for displaying the guest message table.
     *
     * This method prepares the table structure using CustomTable object,
     * sets up columns based on the headers defined,
     * and passes the retrieved data from getAll() method to populate the table.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('administrator::livewire.guestmessage.reply', ['replied' => $this->replied]);
    }
}
