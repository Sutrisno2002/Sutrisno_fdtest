<?php

namespace Modules\Administrator\Livewire\Page;

use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Common\Contracts\WithRemoveModal;
use Modules\Common\Contracts\WithTable;
use Modules\Common\Models\Page;
use Modules\Common\Services\Repositories\PageRepo;
use Modules\Common\Traits\Utils\FlashMessage;
use Modules\Common\Utils\CustomTable;

class Table extends Component
{
    use WithPagination, WithRemoveModal, FlashMessage, WithTable;

    /**
     * Defines the properties used
     * in this component
     *
     * @var string
     */
    public $status;
    public $sort = 'title';
    public $order = 'desc';
    public $search;
    public $destroyId;
    public $per_page = 10;

    /**
     * Define query string used
     * in this component
     *
     * @var array
     */
    protected $queryString = [
        'search', 'sort', 'order',
    ];

    /**
     * Define livewire event listeners
     * @var array
     */
    protected $listeners = [
        self::TABLE_SORT_ORDER,
        self::CANCEL,
        self::DESTROY,
        self::FLASH => '$refresh',
    ];

    /**
     * Define table headers
     *
     * @var array
     */
    public function headers()
    {
        $headers = [
            [
                'label' => 'Nama Halaman',
                'name' => 'title',
                'sortable' => true,
            ],
            [
                'label' => 'Deskripsi Singkat',
                'name' => 'short_description',
                'sortable' => false,
            ],
            [
                'label' => 'Status',
                'name' => 'is_active',
                'sortable' => false,
            ],
            [
                'label' => 'Dibuat Pada',
                'name' => 'created_at',
                'sortable' => false,
            ],
            [
                'label' => 'Aksi',
                'name' => null,
                'sortable' => false,
            ],
        ];
    
        return $headers;
    }

    /**
     * Define props value before component rendered
     *
     * @return void
     */
    public function mount()
    {
        // $this->sort = request('sort') ?: 'title';
        // $this->order = request('order') ?: 'desc';
        // $this->search = request('search');
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
        $this->resetPage();

        // $this->reset('...props');
    }

    /**
     * Get all Page data from resource
     *
     * @return void
     */
    public function getAll()
    {
        return (new PageRepo())->filters((object) [
            'search' => $this->search,
            'sort' => $this->sort,
            'order' => $this->order,
            'status' => $this->status,
        ], $this->per_page);
    }

    /**
     * Change post status bocome archive or publish
     *
     * @param  string $id
     * @return void
     */
    public function archive(?string $id)
    {
        try {
            $page = Page::find($id);

            if (!$page) {
                throw new Exception('Halaman web tidak ditemukan, Halaman web gagal dinonaktifkan.');
            }

            $text = $page->is_active == true ? 'Halaman web berhasil dinonaktifkan.' : 'Halaman web berhasil diaktifkan.';
            if ($page->is_active == true) {
                $page->update([
                    'is_active' => false,
                ]);
            } else {
                $page->update([
                    'is_active' => true,
                ]);
            }

            return $this->dispatchSuccess($text);
        } catch (Exception $exception) {
            return $this->dispatchError($exception->getMessage());
        }
    }

    /**
     * Destroy page from resource
     *
     * @return void
     */
    public function destroy()
    {
        try {
            $page = Page::find($this->destroyId);
            $page->delete();

            $this->dispatch('close-modal');

            return $this->dispatchSuccess('Galeri berhasil ditambahkan.');
        } catch (Exception $exception) {
            return $this->dispatchError($exception->getMessage());
        }
    }

    public function render()
    {
        $table = new CustomTable;
        $table->columns(self::headers());
        return view('administrator::livewire.page.table', [
            'datas' => $this->getAll(),
            'table' => $table,
        ]);
    }
}
