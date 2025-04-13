<?php

namespace Modules\Administrator\Livewire\Role;

use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Common\Contracts\WithRemoveModal;
use Modules\Common\Contracts\WithTable;
use Modules\Common\Traits\Utils\FlashMessage;
use Modules\Common\Utils\CustomTable;
use Modules\Core\Models\Role;
use Modules\Core\Services\Repositories\RoleRepo;

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

    /**
     * Define table headers
     * @var array
     */
    public function headers()
    {
        return [
            [
                'label' => 'Guard',
                'name' => 'guard',
                'sortable' => false,
            ],
            [
                'label' => 'Nama',
                'name' => 'name',
                'sortable' => true,
            ],
            [
                'label' => 'Permissions',
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
     * Get all role data from resource
     * @return void
     */
    public function getAll()
    {
        return (new RoleRepo)->filters((object) [
            'search' => $this->search,
            'sort' => $this->sort,
            'order' => $this->order,
        ], $this->per_page);
    }

    /**
     * Destroy role from resource
     * @return void
     */
    public function destroy()
    {
        try {
            $role = Role::find($this->destroyId);

            if (!$role) {
                throw new Exception('Role tidak ditemukan, role gagal dihapus.', 404);
            }

            $role->delete();
            $this->reset('destroyId');

            return $this->dispatchSuccess('Role berhasil dihapus.', true);
        } catch (Exception $exception) {
            $this->reset('destroyId');
            return $this->dispatchError($exception->getMessage(), true);
        }
    }

    public function render()
    {
        $table = new CustomTable;
        $table->columns(self::headers());

        return view('administrator::livewire.role.table', [
            'datas' => self::getAll(),
            'table' => $table,
        ]);
    }
}
