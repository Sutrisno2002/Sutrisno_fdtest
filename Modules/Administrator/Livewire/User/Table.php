<?php

namespace Modules\Administrator\Livewire\User;

use Exception;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Common\Contracts\WithRemoveModal;
use Modules\Common\Contracts\WithTable;
use Modules\Common\Services\ImageService;
use Modules\Common\Traits\Utils\FlashMessage;
use Modules\Common\Utils\CustomTable;
use Modules\Core\Models\User;
use Modules\Core\Services\Repositories\UserRepo;

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
     * Define query string used
     * in this component
     * @var array
     */
    protected $queryString = [
        'search',
    ];

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
     * Define props value before component rendered
     *
     * @return void
     */
    public function mount()
    {
        //
    }

    public $verifiedFilter = '';

// Modifikasi method yang mengambil data, biasanya bernama mount() atau render()
public function updatedVerifiedFilter()
{
    // Reset pagination saat filter berubah
    $this->resetPage();
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
                'label' => 'Terverifikasi?',
                'name' => null,
                'sortable' => false,
            ],
            [
                'label' => 'Status?',
                'name' => null,
                'sortable' => false,
            ],
            [
                'label' => 'Role?',
                'name' => null,
                'sortable' => false,
            ],
            [
                'label' => 'Dibuat Pada',
                'name' => 'created_at',
                'sortable' => true,
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
     * Get all user data from resource
     * @return void
     */
    public function getAll()
    {
        Log::info('Verified Filter Value: ' . $this->verifiedFilter);
        return (new UserRepo)->filters((object) [
            'except_role' => ['Developer'],
            'search' => $this->search,
            'sort' => $this->sort,
            'order' => $this->order,
            'verified' => $this->verifiedFilter,
        ], $this->per_page);

        // Log::info('Query Result Count: ' . $result->count());
    }

    /**
     * Destroy user from resource
     * @return void
     */
    public function destroy()
    {
        try {
            $user = User::find($this->destroyId);

            if (!$user) {
                throw new Exception('User tidak ditemukan, user gagal dihapus.', 404);
            }

            // Check if user have an avatar
            if ($user->avatar) {
                // Remove existing avatar
                (new ImageService)->removeImage('images', $user->avatar);
            }

            $user->delete();
            $this->reset('destroyId');

            return $this->dispatchSuccess('User berhasil dihapus.', true);
        } catch (Exception $exception) {
            $this->reset('destroyId');
            return $this->dispatchError($exception->getMessage(), true);
        }
    }

    public function render()
    {
        $table = new CustomTable;
        $table->columns(self::headers());

        return view('administrator::livewire.user.table', [
            'datas' => self::getAll(),
            'table' => $table,
        ]);
    }
}
