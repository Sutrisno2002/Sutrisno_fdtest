<?php

namespace Modules\Core\Http\Livewire\AppSetting;

use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Common\Models\AppSetting;
use Modules\Common\Services\Repositories\AppSettingRepo;

class Table extends Component
{
    use WithPagination;

    /**
     * Defines the properties used
     * in this component
     *
     * @var string
     */
    public $filters;
    public $sort = 'created_at';
    public $order = 'desc';
    public $search;
    public $destroyId;
    public $per_page = 10;
    public $group;

    /**
     * Define query string used
     * in this component
     *
     * @var array
     */
    protected $queryString = [
        'search', 'sort', 'order', 'group',
    ];

    /**
     * Define table headers
     *
     * @var array
     */
    public $headers = [
        [
            'cell_name' => 'Label',
            'column_name' => 'name',
            'sortable' => true,
        ],
        [
            'cell_name' => 'Key (cache)',
            'column_name' => 'key',
            'sortable' => true,
        ],
        [
            'cell_name' => 'Tipe',
            'column_name' => 'type',
            'sortable' => true,
        ],
        [
            'cell_name' => 'Aksi',
            'column_name' => null,
            'sortable' => false,
        ],
    ];

    /**
     * Define props value before component rendered
     *
     * @return void
     */
    public function mount()
    {
        $this->sort = request('sort') ?: 'created_at';
        $this->order = request('order') ?: 'desc';
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
    public function updatedSearch($value)
    {
        $this->resetPage();
        $this->search = $value;
    }

    /**
     * To handle sort dropdown
     * Update filters property value
     *
     * @param  string $value
     * @return void
     */
    public function sort($column)
    {
        $this->resetPage();
        $this->sort = $column;

        if (!$this->order) {
            $this->order = 'asc';
        } elseif ($this->order == 'asc') {
            $this->order = 'desc';
        } elseif ($this->order == 'desc') {
            $this->sort = null;
            $this->order = null;
        }
    }

    /**
     * To handle order dropdown
     * Update filters property value
     *
     * @param  string $value
     * @return void
     */
    public function order($order)
    {
        $this->resetPage();
        $orders = ['asc', 'desc'];
        if (in_array($order, $orders)) {
            $this->order = $order;
        } else {
            $this->order = null;
        }
    }

    /**
     * To handle perpage pagination
     *
     * @param  mixed $total
     * @return void
     */
    public function updatedPerPage($total)
    {
        $this->resetPage();
        $this->per_page = $total;
    }

    /**
     * To handle reset search property
     * When button with attribute wire:click={resetSearch}
     * This method will be running
     *
     * @return void
     */
    public function resetSearch()
    {
        $this->reset('search');
    }

    /**
     * To handle apply filter property
     * When button with attribute wire:click={searchFilters}
     * This method will be running
     *
     * @return void
     */
    public function searchFilters()
    {
        $this->resetPage();

        // if (!$this->property) {
        //     $this->reset('property');
        // }
    }

    /**
     * To handle reset filter property
     * When button with attribute wire:click={resetFilter}
     * This method will be running
     *
     * @return void
     */
    public function resetFilters()
    {
        // $this->resetPage();
        $this->reset('search', 'sort', 'order', 'group');

        // $this->reset('...props');
    }

    /**
     * Get all groups from database
     *
     * @return void
     */
    public function getGroups()
    {
        return (new AppSettingRepo())->getGroupField();
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
            $appsetting = AppSetting::find($this->destroyId);
            $appsetting->delete();

            $this->dispatch('close-modal');

            return session()->flash('success', 'Pengaturan berhasil dihapus.');
        } catch (Exception $exception) {
            return session()->flash('error', $exception->getMessage());
        }
    }

    public function render()
    {
        return view('core::livewire.app-setting.table', [
            'datas' => $this->getAll(),
            'groups' => $this->getGroups(),
        ]);
    }
}
