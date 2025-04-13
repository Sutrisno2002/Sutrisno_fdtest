<?php

namespace Modules\Administrator\Livewire\Faq;

use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Common\Models\Faq;
use Modules\Common\Models\Category;
use Modules\Common\Utils\CustomTable;
use Modules\Common\Contracts\WithTable;
use Modules\Common\Contracts\WithRemoveModal;
use Modules\Common\Traits\Utils\FlashMessage;
use Modules\Common\Services\Repositories\FaqRepo;

class Table extends Component
{
    use WithPagination, WithTable, WithRemoveModal, FlashMessage;

    /**
     * Defines the properties used
     * in this component
     *
     * @var string
     */
    public $filters;
    public $search;
    public $category;
    public $sort = 'sort_order';
    public $order = 'asc';
    public $destroyId = '';
    public $per_page = 10;
    public $mode;

    /**
     * Define query string used
     * in this component
     *
     * @var array
     */
    protected $queryString = [
        'search',
    ];

    protected $listeners = [
        'createdFaq' => 'createdFaq',
        'updatedFaq' => 'updatedFaq',
        self::FLASH => '$refresh',
        self::TABLE_SORT_ORDER,
        self::CHANGE_PERPAGE,
        self::DESTROY,
    ];


    /**
     * Define table headers
     * @var array
     */
    public function headers()
    {
        return [
            [
                'label' => 'Pertanyaan',
                'name' => 'question',
                'sortable' => true,
            ],
            [
                'label' => 'Aktif?',
                'name' => 'is_active',
                'sortable' => false,
            ],
            [
                'label' => 'Unggulan?',
                'name' => 'is_featured',
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
        //
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
        return (new FaqRepo())->filters((object) [
            'search' => $this->search,
            'category' => $this->category,
            'sort' => $this->sort,
            'order' => $this->order,
        ], $this->per_page);
    }

    /**
     * Edit faq or sub faq action
     *
     * @param  string $id
     * @return void
     */
    public function edit($id)
    {
        $this->mode = 'edit';
        return $this->dispatch('editFaq', $id)->to(Edit::class);
    }

    /**
     * Created faq callback
     * Listen from another component event
     *
     * @return void
     */
    public function createdFaq()
    {
        $this->resetPage();
        $this->reset('mode');
    }

    /**
     * Updated faq callback
     * Listen from another component event
     *
     * @return void
     */
    public function updatedFaq()
    {
        $this->resetPage();
        $this->reset('mode');
    }

    /**
     * Updated callback
     * Listen from another component event
     *
     * @return void
     */
    public function updated($property, $value)
    {
        $this->resetPage();
    }

    /**
     * Update banner position while drag n drop
     *
     * @param  array $list
     * @return void
     */
    public function updateOrder(?array $list)
    {
        foreach ($list as $item) {
            Faq::find($item['value'])->update([
                'sort_order' => $item['order'],
            ]);
        }
    }

    /**
     * Destroy faq from resource
     *
     * @return void
     */
    public function destroy()
    {
        try {
            $faq = Faq::find($this->destroyId);

            if (!$faq) {
                throw new Exception('FAQ tidak ditemukan, FAQ gagal dihapus.');
            }

            $faq->delete();

            $this->reset('destroyId');

            return $this->dispatchSuccess('FAQ Berhasil dihapus.', true);
        } catch (Exception $exception) {
            $this->reset('destroyId');
            return $this->dispatchError($exception->getMessage(), true);
        }
    }

    /**
     * Get all faq categories
     *
     * @return void
     */
    public function getCategories()
    {
        return Category::whereNull('parent_id')
            ->whereNotNull('status')
            ->where('group', 'faqs')
            ->get(['slug', 'name']);
    }

    public function render()
    {
        $table = new CustomTable;
        $table->columns(self::headers());

        return view('administrator::livewire.faq.table', [
            'datas' => $this->getAll(),
            'categories' => $this->getCategories(),
            'table' => $table
        ]);
    }
}
