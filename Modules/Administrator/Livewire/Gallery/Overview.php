<?php

namespace Modules\Administrator\Livewire\Gallery;

use Livewire\Component;
use Modules\Common\Contracts\WithThirdParty;
use stdClass;

class Overview extends Component
{
    use WithThirdParty;

    /**
     * Defines the properties used
     * in this component
     *
     * @var string
     */
    public ?string $sort = 'created_at';
    public ?string $order = 'desc';
    public ?string $destroyId = '';
    public ?string $status = 'all';
    public ?string $transaction_type = 'all';
    public ?string $payment_type = 'all';
    public ?string $partner = '';

    /**
     * Defines the properties used
     * in this component
     *
     * @var int
     */
    public ?int $per_page = 10;

    /**
     * Define query string used
     * in this component
     *
     * @var array
     */
    protected $queryString = [
        'sort',
        'transaction',
        'status',
        'dates',
    ];
    public array $dates = [
        'start' => '',
        'end' => '',
    ];

    /**
     * Define livewire event listeners
     * @var array
     */
    protected $listeners = [
        self::UPDATED_DATERANGEPICKER,
    ];

    /**
     * Define props value before component rendered
     *
     * @return void
     */
    public function mount()
    {
        $this->dates['start'] = now()->startOfYear()->toDateString();
        $this->dates['end'] = now()->endOfYear()->toDateString();
    }

    public function updatedDaterangePicker(array $value)
    {
        $this->dates = $value;
    }

    public function render()
    {
        return view('administrator::livewire.gallery.overview',[
        ]);
    }
}