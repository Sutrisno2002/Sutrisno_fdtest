<?php

namespace Modules\Administrator\Livewire\Dashboard;

use Livewire\Component;
use Modules\Common\Contracts\WithThirdParty;
use Modules\Common\Traits\Utils\FlashMessage;
use Modules\ECommerce\Services\Repositories\OrderRepo;

class Revenue extends Component
{
    use WithThirdParty, FlashMessage;

    /**
     * Define int props
     * @var int
     */
    public int $total_revenue = 0;

    /**
     * Define array props
     * @var array
     */
    public array $dates = [
        'start' => '',
        'end' => '',
    ];
    public array $labels = [];
    public array $data = [];

    /**
     * Define event listeners
     * @var array
     */
    public $listeners = [
        self::UPDATED_DATERANGEPICKER,
    ];

    /**
     * Define props value before component rendered
     * @return void
     */
    public function mount(array $dates)
    {
        $this->dates = $dates;
        $this->data = self::getData();
    }

    /**
     * Hooks for date range picker property
     * Doing date range picker validation after
     * Date property has been updated
     *
     * @param  array $value
     * @return void
     */
    public function updatedDaterangePicker(array $value)
    {
        $data = self::getData();
        $this->dates = $value;
        $this->data = $data;
        $this->dispatch('update-revenue-chart', [
            'labels' => $this->labels,
            'data' => $data,
        ]);
    }


    /**
     * Count order by status
     * @return Order
     */
    public function sumOrder($order_status, $dates)
    {
        return (new OrderRepo)->sumOrder($order_status, $dates);
    }

    /**
     * Get chart data or data
     * @return array
     */
    public function getData()
    {
        $dates = collect(chartMetrics($this->dates));
        $data = $dates->map(function ($date) {
            return self::sumOrder('complete', $date);
        });

        $this->total_revenue = $data->sum();

        return [
            [
                'label' => 'Pesanan (Selesai)',
                'data' => $data->toArray()
            ],
        ];
    }

    public function render()
    {
        return view('administrator::livewire.dashboard.revenue');
    }
}
