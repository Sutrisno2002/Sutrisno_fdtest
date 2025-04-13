<?php

namespace Modules\Administrator\Livewire\Seo;

use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Common\Contracts\WithTable;
use Modules\Common\Models\AppSetting;
use Modules\Common\Services\Repositories\AppSettingRepo;
use Modules\Common\Traits\Utils\FlashMessage;
use Modules\Common\Utils\CustomTable;

class Table extends Component
{
    use WithPagination, WithTable, FlashMessage;

    /**
     * Define string props
     * @var string
     */
    public ?string $sort = 'name';
    public ?string $order = 'asc';
    public ?string $search = '';
    public ?string $group = '';

    /**
     * Define int props
     * @var int
     */
    public ?int $per_page = 10;

    /**
     * Define query string used
     * in this component
     *
     * @var array
     */
    public array $group_list = [
        'contact', 'front', 'website_general',
    ];

    /**
     * Define query string used in this component
     * @var array
     */
    protected $queryString = [
        'search', 'group',
    ];

    /**
     * Define livewire event listeners
     * @var array
     */
    protected $listeners = [
        self::TABLE_SORT_ORDER,
        self::CHANGE_PERPAGE,
    ];

    /**
     * Define table headers
     * @var array
     */
    public function headers()
    {
        return [
            [
                'label' => 'Label',
                'name' => 'name',
                'sortable' => true,
            ],
            [
                'label' => 'Nilai',
                'name' => 'value',
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
     * Define props value before component rendered
     *
     * @return void
     */
    public function mount()
    {
        $this->search = request('search');

        if (request('group')) {
            $this->group = request('group');
        } else {
            // dd($this->getGroups()->first());
            $this->group = $this->getGroups()->first() ? $this->getGroups()->first() : null;
        }
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
     * Get all groups from database
     * @return AppSetting
     */
    public function getGroups()
    {
        $res = (new AppSettingRepo())->findByGroup('seo');

        return $res->pluck('key')->map(function ($seo) {
            $arr = explode('_', $seo);
            return implode(' ', array_slice($arr, 2));
        })->unique();
    }

    /**
     * Get all $VARIABLE$ data from resource
     *
     * @return void
     */
    public function getAll()
    {
        return (new AppSettingRepo())->filters((object) [
            'sort' => $this->sort,
            'order' => $this->order,
            'search' => $this->search,
            'term' => $this->group,
        ], $this->per_page);
    }

    /**
     * Destroy appsetting from resource
     *
     * @return void
     */
    public function destroy()
    {
        try {
            $seo = AppSetting::find($this->destroyId);
            $seo->delete();

            $this->dispatch('close-modal');

            return session()->flash('success', 'Pengaturan berhasil dihapus.');
        } catch (Exception $exception) {
            return session()->flash('error', $exception->getMessage());
        }
    }

    public function render()
    {
        $table = new CustomTable;
        $table->columns(self::headers());

        return view('administrator::livewire.seo.table', [
            'datas' => $this->getAll(),
            'groups' => $this->getGroups(),
            'table' => $table,
        ]);
    }
}
