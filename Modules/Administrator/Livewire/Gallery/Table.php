<?php

namespace Modules\Administrator\Livewire\Gallery;

use Exception;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Common\Contracts\WithRemoveModal;
use Modules\Common\Contracts\WithTable;
use Modules\Common\Contracts\WithThirdParty;
use Modules\Common\Services\Repositories\GalleryRepo;
use Modules\Common\Traits\Utils\FlashMessage;
use Modules\Common\Utils\CustomTable;
use Modules\Volunteers\Models\Gallery;
use Modules\Volunteers\Models\GalleryImages;

class Table extends Component
{
    use WithThirdParty, WithPagination, WithTable, WithRemoveModal, FlashMessage;

    /**
     * Defines the properties used
     * in this component
     *
     * @var string
     */
    public string $sort = 'created_at';
    public string $order = 'desc';
    public string $search = '';
    public string $destroyId = '';


    public int $per_page = 12;

    /**
     * Define array props
     * in this component
     *
     * @var array
     */
    public $dates = [
        'start' => '',
        'end' => '',
    ];

    /**
     * Define query string used
     * in this component
     *
     * @var array
     */
    protected $queryString = [
        'search',
        'order',
        'dates,'
    ];

    /**
     * Define livewire event listeners
     * @var array
     */
    protected $listeners = [
        self::UPDATED_DATERANGEPICKER,
        self::TABLE_SORT_ORDER,
        self::CHANGE_PERPAGE,
        self::CANCEL,
        self::DESTROY,
        self::FLASH => '$refresh',
    ];

    /**
     * Define props value before component rendered
     *
     * @return void
     */
    public function mount(array $dates)
    {
        $this->dates = $dates;
    }

    public function updatedDaterangePicker(array $value)
    {
        $this->dates = $value;
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

    public function headers()
    {
        $headers = [
            [
                'label' => 'Galeri',
                'name' => null,
                'sortable' => false,
            ],
            [
                'label' => 'Nama Kegiatan',
                'name' => 'title',
                'sortable' => false,
            ],
            [
                'label' => 'Tanggal Kegiatan',
                'name' => 'date',
                'sortable' => true,
            ],
            [
                'label' => 'Pembuat',
                'name' => 'created_by',
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
     * Updated callback
     * Listen from another component event
     *
     * @return void
     */
    public function updated($property = null, $value = null)
    {
        if ($property !== 'destroyId') {
            $this->resetPage();
        }

        if ($property && !$value) {
            $this->reset($property);
        }
    }

    /**
     * Get all Page data from resource
     *
     * @return void
     */
    public function getAll()
    {
        return (new GalleryRepo())->filters((object) [
            'search' => $this->search,
            'sort' => $this->sort,
            'order' => $this->order,
            'date_start' => $this->dates['start'],
            'date_end' => $this->dates['end'], 
        ], $this->per_page);
    }

    /**
     * Destroy page from resource
     *
     * @return void
     */
    public function destroy()
    {
        try {
            $gallery = Gallery::find($this->destroyId);

            if (!$gallery) {
                throw new Exception('Galeri tidak ditemukan, galeri gagal dihapus.');
            }
            
            $galleryPath = 'images/gallery/';
            $galleryFiles = Storage::disk('public')->files($galleryPath);
    
            // Filter file berdasarkan slug product dan Hapus Item 
            foreach ($galleryFiles as $file) {
                if (str_contains($file, $gallery->id)) {
                    Storage::disk('public')->delete($file);
                }
            }

            $gallery->forceDelete();

            $this->reset('destroyId');

            return $this->dispatchSuccess('Galeri berhasil dihapus.', true);
        } catch (Exception $exception) {
            $this->reset('destroyId');
            return $this->dispatchError($exception->getMessage(), true);
        }
    }

    public function render()
    {
        $table = new CustomTable;
        $table->columns(self::headers());
        return view('administrator::livewire.gallery.table', [
            'datas' => $this->getAll(),
            'table' => $table,
        ]);
    }
}
