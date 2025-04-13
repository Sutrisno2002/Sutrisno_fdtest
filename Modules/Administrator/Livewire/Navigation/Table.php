<?php

namespace Modules\Administrator\Livewire\Navigation;

use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Common\Constants\Utilities;
use Modules\Common\Models\Navigation;
use Modules\Common\Services\Repositories\NavigationRepo;

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
    public $sort = 'sort_order';
    public $order = 'asc';
    public $destroyId;
    public $per_page = 10;
    public $mode = 'create';
    public $placement = null;

    /**
     * Define query string used
     * in this component
     *
     * @var array
     */
    protected $queryString = [
        'sort', 'order', 'placement',
    ];

    protected $listeners = [
        'createdNavigation' => 'createdNavigation',
        'updatedNavigation' => 'updatedNavigation',
    ];

    /**
     * Define props value before component rendered
     *
     * @return void
     */
    public function mount()
    {
        $placements = Utilities::NAVIGATION_PLACEMENT;
        $first = array_slice($placements, 0, 1);

        $this->sort = request('sort') ?: 'sort_order';
        $this->order = request('order') ?: 'asc';
        $this->placement = request('placement') ?: $first[0]['value'];
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
     * Get all data from resource
     *
     * @return void
     */
    public function getAll()
    {
        return (new NavigationRepo())->filters((object) [
            'sort' => $this->sort,
            'order' => $this->order,
            'placement' => $this->placement,
        ]);
    }

    /**
     * Update banner position while drag n drop
     *
     * @param  mixed $list
     * @return void
     */
    public function updateOrder($list)
    {
        foreach ($list as $item) {
            Navigation::find($item['value'])->update([
                'sort_order' => $item['order'],
            ]);
        }
    }

    public function createSubNavigation($id, $placement)
    {
        $this->mode = 'create';
        $this->dispatch('administrator::navigation.create', 'createSubNavigation', [
            'id' => $id,
            'placement' => $placement,
        ]);
    }

    public function edit($id)
    {
        $this->mode = 'edit';
        $this->dispatch('administrator::navigation.edit', 'editNavigation', $id);
    }

    public function updated($property, $value)
    {
        if ($property == 'placement') {
            $this->dispatch('administrator::navigation.create', 'changePlacement', $value);
        }
    }

    public function createdNavigation()
    {
        $this->reset('mode');
    }

    public function updatedNavigation()
    {
        $this->reset('mode');
    }

    /**
     * Update banner position while drag n drop
     *
     * @param  mixed $list
     * @return void
     */
    public function updateNavigationOrder($list)
    {
        foreach ($list as $item) {

            Navigation::find($item['value'])->update([
                'sort_order' => $item['order'],
            ]);

            foreach ($item['items'] as $child) {
                $sub = Navigation::find($child['value']);
                $sub->update([
                    'sort_order' => $child['order'],
                ]);
            }
        }
    }

    /**
     * Destroy navigation from resource
     *
     * @return void
     */
    public function destroy()
    {
        try {
            $navigation = Navigation::find($this->destroyId);

            if (!$navigation->childs->isEmpty()) {
                Navigation::destroy($navigation->childs->pluck('id')->toArray());
            }

            $navigation->delete();

            $this->dispatch('close-modal');
            $this->reset('destroyId');

            return session()->flash('success', 'Navigasi berhasil dihapus.');
        } catch (Exception $exception) {
            return session()->flash('error', $exception->getMessage());
        }
    }

    public function render()
    {
        return view('administrator::livewire.navigation.table', [
            'navigations' => $this->getAll(),
            'placements' => Utilities::NAVIGATION_PLACEMENT,
        ]);
    }
}
