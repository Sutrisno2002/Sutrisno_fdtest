<?php

namespace Modules\Administrator\Livewire\AppSetting;

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
        'contact', 'front', 'website_general', 'social',
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
            $this->group = $this->getGroups()->first() ? $this->getGroups()->first()->group : null;
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
        return (new AppSettingRepo())->getGroupField($this->group_list);
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
            'group' => $this->group,
            'groups' => $this->group_list,
        ], $this->per_page);
    }

    public function render()
    {
        $table = new CustomTable;
        $table->columns(self::headers());

        return view('administrator::livewire.app-setting.table', [
            'datas' => $this->getAll(),
            'groups' => $this->getGroups(),
            'table' => $table,
        ]);
    }
}
