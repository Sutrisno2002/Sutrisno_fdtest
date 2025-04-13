<?php

namespace Modules\Administrator\Livewire\Slider;

use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Common\Contracts\WithRemoveModal;
use Modules\Common\Contracts\WithTable;
use Modules\Common\Models\Slider;
use Modules\Common\Services\ImageService;
use Modules\Common\Services\Repositories\SliderRepo;
use Modules\Common\Traits\Utils\FlashMessage;
use Modules\Common\Utils\CustomTable;

class Table extends Component
{
    use WithPagination, WithTable, WithRemoveModal, FlashMessage;

    /**
     * Define string props
     * @var string
     */
    public ?string $sort = 'position';
    public ?string $order = 'asc';
    public ?string $search = '';
    public ?string $destroyId = '';

    /**
     * Define int props
     * @var int
     */
    public ?int $per_page = 10;

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
     * Define query string used
     * in this component
     *
     * @var array
     */
    protected $queryString = [
        'search',
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
                'label' => 'Media',
                'name' => 'media_path',
                'sortable' => false,
            ],
            [
                'label' => 'Nama',
                'name' => 'name',
                'sortable' => true,
            ],
            [
                'label' => 'Posisi',
                'name' => 'position',
                'sortable' => true,
            ],
            [
                'label' => 'Ditampilkan?',
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
     * Update banner position while drag n drop
     *
     * @param  array|null $list
     * @return void
     */
    public function updateOrder(?array $list)
    {
        foreach ($list as $item) {
            Slider::find($item['value'])->update([
                'position' => $item['order'],
            ]);
        }
    }

    /**
     * Get all data from resource
     *
     * @return void
     */
    public function getAll()
    {
        return (new SliderRepo())->filters((object) [
            'sort' => $this->sort,
            'order' => $this->order,
            'search' => $this->search,
        ], $this->per_page);
    }

    /**
     * Change slider status become show or hide
     *
     * @param  int $id
     * @return void
     */
    public function showOrHide(?int $id)
    {
        try {
            $slider = Slider::find($id);

            if (!$slider) {
                throw new Exception('Slider tidak ditemukan, pengubahan visibilitas gagal.');
            }

            $sliderStatus = $slider->is_active ? 'disembunyikan dari' : 'ditampilkan di';
            $slider->update([
                'is_active' => $slider->is_active ? 0 : 1,
            ]);

            return $this->dispatchSuccess('Slider berhasil ' . $sliderStatus . ' halaman publik.');
        } catch (Exception $exception) {
            return $this->dispatchError($exception->getMessage());
        }
    }

    /**
     * Destroy slider from resource
     * @return void
     */
    public function destroy()
    {
        try {
            $slider = Slider::find($this->destroyId);

            if (!$slider) {
                throw new Exception('Slider tidak ditemukan, slider gagal dihapus.');
            }

            if ($slider->desktop_media_path) {
                (new ImageService)->removeImage('images', $slider->desktop_media_path);
            }

            $slider->delete();
            $this->reset('destroyId');

            return $this->dispatchSuccess('Slider berhasil dihapus.', true);
        } catch (Exception $exception) {
            $this->reset('destroyId');
            return $this->dispatchError($exception->getMessage(), true);
        }
    }

    public function render()
    {
        $table = new CustomTable;
        $table->columns(self::headers());

        return view('administrator::livewire.slider.table', [
            'datas' => $this->getAll(),
            'table' => $table,
        ]);
    }
}
