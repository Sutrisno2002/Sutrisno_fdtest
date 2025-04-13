<?php

namespace Modules\Administrator\Livewire\GuestMessage;

use Exception;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Common\Contracts\WithRemoveModal;
use Modules\Common\Contracts\WithTable;
use Modules\Common\Models\GuestMessage;
use Modules\Common\Models\Testimonial;
use Modules\Common\Services\ImageService;
use Modules\Common\Services\Repositories\GuestMessageRepo;
use Modules\Common\Services\Repositories\TestimonialRepo;
use Modules\Common\Traits\Utils\FlashMessage;
use Modules\Common\Utils\CustomTable;

class Table extends Component
{
    use WithPagination, WithTable, WithRemoveModal, FlashMessage;

    /**
     * Define string props
     * @var string
     */
    public ?string $sort = 'created_at';
    public ?string $order = 'desc';
    public ?string $search = '';
    public ?string $destroyId = '';

    /**
     * Define int props
     * @var int
     */
    public ?int $per_page = 10;

    /**
     * Define livewire event listeners
     * @var array
     */
    protected $listeners = [
        self::FLASH => '$refresh',
        self::TABLE_SORT_ORDER,
        self::CHANGE_PERPAGE,
        self::DESTROY,
    ];

    /**
     * Define query string used
     * in this component
     *
     * @var array
     */
    protected $queryString = [
        'search',
    ];

    /**
     * Define props value before component rendered
     *
     * @return void
     */
    public function mount()
    {
        //
    }

    /**
     * Define table headers
     * @var array
     */
    public function headers()
    {
        return [
            [
                'label' => 'Nama',
                'name' => 'name',
                'sortable' => true,
            ],
            [
                'label' => 'Email',
                'name' => 'email',
                'sortable' => false,
            ],
            [
                'label' => 'Whatsapp',
                'name' => 'whatsapp_number',
                'sortable' => false,
            ],
            [
                'label' => 'Subjek',
                'name' => 'subject',
                'sortable' => false,
            ],
            [
                'label' => 'Pesan',
                'name' => 'message',
                'sortable' => false,
            ],
            [
                'label' => 'Status',
                'name' => null,
                'sortable' => false,
            ],
            [
                'label' => 'Aksi',
                'name' => null,
                'sortable' => false,
            ],
        ];
    }

    /**
     * Livewire hooks, when search props has been updated
     * This method will be running
     *
     * @param  string $value
     * @return void
     */
    public function updated($property, $value)
    {
        if ($property !== 'destroyId') {
            $this->resetPage();
        }

        if (!$value || $value == null) {
            $this->reset($property);
        }
    }

    /**
     * Get all data from resource
     *
     * @return void
     */
    public function getAll()
    {
        return (new GuestMessageRepo())->filters((object) [
            'sort' => $this->sort,
            'order' => $this->order,
            'search' => $this->search,
        ], $this->per_page);
    }

    /**
     * Reply Message
     * Dispatch to reply class
     *
     * @param  int|null $id
     * @return void
     */
    public function reply(?int $id)
    {
        return $this->dispatch('reply', $id)->to(Reply::class);
    }

    /**
     * View Message
     * Dispatch to reply class
     *
     * @param  int|null $id
     * @return void
     */
    public function replied(?int $id)
    {
        return $this->dispatch('replied', $id)->to(Reply::class);
    }


    /**
     * Update guest_message status
     *
     * @param  int|null $id
     * @return void
     */
    public function seenOrUnseen(?int $id)
    {
        try {
            $guestmessage = GuestMessage::find($id);

            if (!$guestmessage) {
                throw new Exception('Pesan tidak ditemukan, pengubahan penanda gagal.');
            }

            $GuestMessageStatus = isset($guestmessage->seen_at) && isset($guestmessage->seen_by) ? 'belum' : 'sudah';
            if (!$guestmessage->seen_at && !$guestmessage->seen_by) {
                $updateData = [
                    'seen_at' => now(),
                    'seen_by' => Auth::user()->id,
                ];
            } else {
                $updateData = [
                    'seen_at' => null,
                    'seen_by' => null,
                ];
            }
            $guestmessage->update($updateData);

            return $this->dispatchSuccess('Pesan berhasil ditandai sebagai ' . $GuestMessageStatus . ' dibaca.');
        } catch (Exception $exception) {
            return $this->dispatchError($exception->getMessage());
        }
    }

    /**
     * Destroy guest_message from resource
     * @return void
     */
    public function destroy()
    {
        try {
            $guestmessage = GuestMessage::find($this->destroyId);

            if (!$guestmessage) {
                throw new Exception('GuestMessage tidak ditemukan, GuestMessage gagal dihapus.');
            }

            $guestmessage->delete();
            $this->reset('destroyId');

            return $this->dispatchSuccess('GuestMessage berhasil dihapus.', true);
        } catch (Exception $exception) {
            $this->reset('destroyId');
            return $this->dispatchError($exception->getMessage(), true);
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
        $table = new CustomTable;
        $table->columns(self::headers());

        return view('administrator::livewire.guestmessage.table', [
            'datas' => $this->getAll(),
            'table' => $table,
        ]);
    }
}
