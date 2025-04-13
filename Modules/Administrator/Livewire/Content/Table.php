<?php

namespace Modules\Administrator\Livewire\Content;

use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Common\Contracts\WithTable;
use Modules\Common\Models\Content;
use Modules\Common\Services\Repositories\ContentRepo;
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
        // 'contact', 'front', 'website_general',
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
            $this->group = $this->getGroups()->first() ? $this->getGroups()->first()->slug_group : null;
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
     * @return Content
     */
    public function getGroups()
    {
        return (new ContentRepo())->getGroupField($this->group_list);
    }

    /**
     * Get all $VARIABLE$ data from resource
     *
     * @return void
     */
    public function getAll()
    {
        return (new ContentRepo())->filters((object) [
            'sort' => $this->sort,
            'order' => $this->order,
            'search' => $this->search,
            'slug_group' => $this->group,
        ], $this->per_page);
    }

    /**
     * Destroy content from resource
     *
     * @return void
     */
    public function destroy()
    {
        try {
            $content = Content::find($this->destroyId);
            $content->delete();

            $this->dispatch('close-modal');

            return session()->flash('success', 'Konten berhasil dihapus.');
        } catch (Exception $exception) {
            return session()->flash('error', $exception->getMessage());
        }
    }

    public function render()
    {
        $table = new CustomTable;
        $table->columns(self::headers());

        return view('administrator::livewire.content.table', [
            'datas' => $this->getAll(),
            'groups' => ($this->getGroups()),
            'table' => $table,
        ]);
    }
}
