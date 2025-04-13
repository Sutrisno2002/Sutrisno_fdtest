<?php

namespace Modules\Common\Livewire\Utils;

use Livewire\Component;

class DaterangePicker extends Component
{
    /**
     * Defines string properties
     * @var string
     */
    public ?string $component_id = '';
    public ?string $class = '';

    /**
     * Defines array properties
     * @var array
     */
    public ?array $daterangepicker_config = [];
    public ?array $value = [
        'start' => '',
        'end' => '',
    ];

    /**
     * Livewire callback events
     * @var array
     */
    protected $listeners = [
        'resetThirdParty' => 'resetDaterangePicker',
    ];

    /**
     * Define default configuration of DaterangePicker
     * @return array
     */
    public function defaultConfig()
    {
        return [];
    }

    /**
     * Set default value before component rendered
     *
     * @param  string|null $value
     * @param  array|null $config
     * @return void
     */
    public function mount(
        ?string $class = '',
        ?array $value = [],
        ?array $config = []
    ) {
        $this->value = $value;
        $this->component_id = 'daterangepicker-' . uniqid();

        if (!empty($config)) {
            $this->daterangepicker_config = $config;
        } else {
            $this->daterangepicker_config = self::defaultConfig();
        }
    }

    /**
     * When daterangepicker is changed, this component will
     * Notify other component with "updatedDaterangePicker" event
     *
     * @param  string $value
     * @return void
     */
    public function updatedValue($value)
    {
        $this->dispatch('updatedDaterangePicker', $this->value);
    }

    /**
     * Apply daterangepicker event
     *
     * @return void
     */
    public function apply()
    {
        $this->dispatch('apply-daterangepicker');
    }

    public function render()
    {
        return view('common::livewire.utils.daterange-picker');
    }
}