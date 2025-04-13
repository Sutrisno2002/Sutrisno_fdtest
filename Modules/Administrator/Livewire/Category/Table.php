<?php

namespace Modules\Administrator\Livewire\Category;

use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Common\Models\Category;
use Modules\Common\Services\Repositories\CategoryRepo;

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

    /**
     * Define query string used
     * in this component
     *
     * @var array
     */
    protected $queryString = [
        'sort', 'order',
    ];

    protected $listeners = [
        'created' => 'created',
        'updated' => 'updated',
    ];

    /**
     * Define props value before component rendered
     *
     * @return void
     */
    public function mount()
    {
        $this->sort = request('sort') ?: 'sort_order';
        $this->order = request('order') ?: 'asc';
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
        return (new CategoryRepo())->filters((object) [
            'sort' => $this->sort,
            'order' => $this->order,
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
            Category::find($item['value'])->update([
                'sort_order' => $item['order'],
            ]);
        }
    }

    public function createSubCategory($id)
    {
        $this->mode = 'create';
        $this->dispatch('administrator::category.create', 'createSubCategory', $id);
    }

    public function edit($id)
    {
        $this->mode = 'edit';
        $this->dispatch('administrator::category.edit', 'editCategory', $id);
    }

    public function created()
    {
        $this->reset('mode');
    }

    public function updated()
    {
        $this->reset('mode');
    }

    /**
     * Update banner position while drag n drop
     *
     * @param  mixed $list
     * @return void
     */
    public function updateCategoryOrder($list)
    {
        foreach ($list as $item) {

            Category::find($item['value'])->update([
                'sort_order' => $item['order'],
            ]);

            foreach ($item['items'] as $child) {
                $sub = Category::find($child['value']);
                $sub->update([
                    'sort_order' => $child['order'],
                ]);
            }
        }
    }

    /**
     * Destroy category from resource
     *
     * @return void
     */
    public function destroy()
    {
        try {
            $category = Category::find($this->destroyId);

            if (!$category->childs->isEmpty()) {
                Category::destroy($category->childs->pluck('id')->toArray());
            }

            $category->delete();

            $this->dispatch('close-modal');
            $this->reset('destroyId');

            return session()->flash('success', 'Produk kategori berhasil dihapus.');
        } catch (Exception $exception) {
            return session()->flash('error', $exception->getMessage());
        }
    }

    public function render()
    {
        return view('administrator::livewire.category.table', [
            'categories' => $this->getAll(),
        ]);
    }
}
