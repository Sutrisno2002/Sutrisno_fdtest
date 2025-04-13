<?php

namespace Modules\Administrator\Livewire\Testimonial;

use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Common\Contracts\WithRemoveModal;
use Modules\Common\Contracts\WithTable;
use Modules\Common\Models\Testimonial;
use Modules\Common\Services\ImageService;
use Modules\Common\Services\Repositories\TestimonialRepo;
use Modules\Common\Traits\Utils\FlashMessage;
use Modules\Common\Utils\CustomTable;

class Table extends Component
{
    use WithPagination, WithTable, WithRemoveModal, FlashMessage;

    /**
     * Define string props
     * @var string
     */
    public ?string $sort = 'created_at';
    public ?string $order = 'desc';
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
                'label' => 'Avatar',
                'name' => 'avatar',
                'sortable' => false,
            ],
            [
                'label' => 'Nama',
                'name' => 'name',
                'sortable' => true,
            ],
            [
                'label' => 'Pesan',
                'name' => 'message',
                'sortable' => false,
            ],
            [
                'label' => 'Rating',
                'name' => 'rating',
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
     * Get all data from resource
     *
     * @return void
     */
    public function getAll()
    {
        return (new TestimonialRepo())->filters((object) [
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
            $testimonial = Testimonial::find($id);

            if (!$testimonial) {
                throw new Exception('Testimonial tidak ditemukan, pengubahan visibilitas gagal.');
            }

            $testimonialStatus = $testimonial->show_in_homepage ? 'disembunyikan dari' : 'ditampilkan di';
            $testimonial->update([
                'show_in_homepage' => $testimonial->show_in_homepage ? 0 : 1,
            ]);

            return $this->dispatchSuccess('Testimonial berhasil ' . $testimonialStatus . ' halaman publik.');
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
            $testimonial = Testimonial::find($this->destroyId);

            if (!$testimonial) {
                throw new Exception('Testimonial tidak ditemukan, Testimonial gagal dihapus.');
            }

            if ($testimonial->avatar) {
                (new ImageService)->removeImage('images', $testimonial->avatar);
            }

            $testimonial->delete();
            $this->reset('destroyId');

            return $this->dispatchSuccess('Testimonial berhasil dihapus.', true);
        } catch (Exception $exception) {
            $this->reset('destroyId');
            return $this->dispatchError($exception->getMessage(), true);
        }
    }

    public function render()
    {
        $table = new CustomTable;
        $table->columns(self::headers());

        return view('administrator::livewire.testimonial.table', [
            'datas' => $this->getAll(),
            'table' => $table,
        ]);
    }
}
