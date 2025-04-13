<?php

namespace Modules\Administrator\Livewire\Member;

use App\Mail\KTAMail;
use Barryvdh\DomPDF\Facade\Pdf;
use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Administrator\Http\Controllers\MemberController;
use Modules\Common\Contracts\WithRemoveModal;
use Modules\Common\Contracts\WithTable;
use Modules\Common\Services\Repositories\MemberRepo;
use Modules\Common\Traits\Utils\FlashMessage;
use Modules\Common\Utils\CustomTable;
use Modules\Volunteers\Models\Member;

class EmailSender extends Component
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

    public $kta_sent = false;
    public $bulkMarker = [];

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
            // [
            //     'label' => '#',
            //     'name' => null,
            //     'sortable' => false,
            // ],
            [
                'label' => 'Nama',
                'name' => 'name',
                'sortable' => false,
            ],
            [
                'label' => 'Email',
                'name' => 'email',
                'sortable' => false,
            ],
            [
                'label' => 'Mendaftar Pada',
                'name' => null,
                'sortable' => false,
            ],
            // [
            //     'label' => 'Aksi',
            //     'name' => null,
            //     'sortable' => false,
            // ],
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

        // if ($property == 'bulkMarker') {
        //     $id = $value;
        //     if (in_array($id, $this->bulkMarker)) {
        //         $this->bulkMarker = array_diff($this->bulkMarker, [$id]);
        //     } else {
        //         $this->bulkMarker[] = $id;
        //     }
        // }
    }

    // public function bulkOneMark($id)
    // {
    //     if (in_array($id, $this->bulkMarker)) {
    //         $this->bulkMarker = array_diff($this->bulkMarker, [$id]);
    //     } else {
    //         $this->bulkMarker[] = $id;
    //     }
    // }

    public function markAll()
    {
        $data = $this->getAll();

        if (count($this->bulkMarker) == 0) {
            $this->bulkMarker = $data->pluck('id')->toArray();
        } else {
            $this->bulkMarker = [];
        }
    }

    /**
     * Get all data from resource
     *
     * @return void
     */
    public function getAll()
    {
        return (new MemberRepo())->filters((object) [
            'search' => $this->search,
            'sort' => $this->sort,
            'order' => $this->order,
            'verify' => 'verified',
            'kta_sent' => $this->kta_sent,
        ], $this->per_page);
    }

    /**
     * Make member KTA
     *
     * @param  Member $member
     * @return void
     */
    public function makeKTA($member)
    {
        $pdfName = [
            'full' => 'kta/' . $member->member_number . '/' . $member->member_number . '_kta.pdf',
        ];

        $path = public_path() . '/kta/' . $member->member_number;

        File::makeDirectory($path, $mode = 0777, true, true);
        $html = (new MemberController)->showKTA($member->id)->render();
        return Pdf::setOption(['dpi' => 300])->loadHTML($html)->setPaper('A4', 'portrait')->save($pdfName['full']);
    }

    public function previewKTA(string $memberId)
    {
        try {
            $member = Member::find($memberId);

            self::makeKTA($member);

            // $path = public_path() . '/kta/' . $member->member_number;
            // Mail::to($member->email)->send(new KTAMail($member));

            // File::deleteDirectory($path);

            $member->update([
                'kta_send_email' => now()->toDateTimeString(),
            ]);

            $this->dispatchSuccess('KTA berhasil dikirim kepada ' . $member->name, true);
            return $member;
        } catch (Exception $exception) {
            return $this->dispatchError('Terjadi kesalahan: ' . $exception->getMessage());
        }
    }

    /**
     * Send email to member
     *
     * @param  string $memberId
     * @return Member
     */
    public function sendEmail(string $memberId)
    {
        try {
            $member = Member::find($memberId);

            self::makeKTA($member);

            $path = public_path() . '/kta/' . $member->member_number;
            Mail::to($member->email)->send(new KTAMail($member));

            File::deleteDirectory($path);

            $member->update([
                'kta_send_email' => now()->toDateTimeString(),
            ]);

            $this->dispatchSuccess('KTA berhasil dikirim kepada ' . $member->name, true);
            return $member;
        } catch (Exception $exception) {
            return $this->dispatchError('Terjadi kesalahan: ' . $exception->getMessage());
        }
    }

    public function bulkSendEmail()
    {
        if (count($this->bulkMarker) == 0) {
            return $this->dispatchError('Anda belum memilih relawan. Silakan pilih relawan terlebih dahulu.', true);
        }

        try {
            foreach ($this->bulkMarker as $memberId) {
                self::sendEmail($memberId);
                sleep(3);
            }

            $count = count($this->bulkMarker);

            $this->reset('bulkMarker');

            return $this->dispatchSuccess("Email berhasil dikirim ke {$count} relawan.", true);
        } catch (Exception $exception) {
            return $this->dispatchError('Terjadi kesalahan: ' . $exception->getMessage());
        }
    }

    public function render()
    {
        $table = new CustomTable;
        $table->columns(self::headers());

        return view('administrator::livewire.member.email-sender', [
            'datas' => $this->getAll(),
            'table' => $table,
        ]);
    }
}
