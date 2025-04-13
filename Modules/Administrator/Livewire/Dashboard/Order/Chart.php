<?php

namespace Modules\Administrator\Livewire\Dashboard\Order;

use Livewire\Component;
use Modules\ECommerce\Models\Order;
use Modules\Common\Contracts\WithThirdParty;
use Modules\Common\Traits\Utils\FlashMessage;
use Modules\ECommerce\Services\Repositories\OrderRepo;

class Chart extends Component
{
    use WithThirdParty, FlashMessage;

    /**
     * Define array props
     * @var array
     */
    public array $dates = [
        'start' => '',
        'end' => '',
    ];

    public array $labels = [
        'Tertunda',
        'Selesai',
        'Kadaluwarsa',
    ];

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
        $this->dates = $value;
        $this->dispatch('update-order-pie-chart', [
            'labels' => $this->labels,
            'data' => self::getData(),
        ]);
    }


    /**
     * Count order by status
     * @return Order
     */
    public function countOrder($order_status)
    {
        return (new OrderRepo)->countOrder($order_status, $this->dates);
    }

    /**
     * Get chart data or data
     * @return array
     */
    public function getData()
    {

        return [
            [
                'label' => 'Total',
                'data' => [
                    self::countOrder('pending'),
                    self::countOrder('complete'),
                    self::countOrder('expired')
                ]
            ],
        ];
    }

    public function render()
    {
        return view('administrator::livewire.dashboard.order.chart');
    }
}
