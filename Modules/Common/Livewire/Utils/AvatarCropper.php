<?php

namespace Modules\Common\Livewire\Utils;

use Livewire\Component;

class AvatarCropper extends Component
{
    /**
     * Defines string properties
     * @var string
     */
    public ?string $value = '';
    public ?string $component_id = '';

    /**
     * Defines array properties
     * @var array
     */
    public $cropper_config = [];

    /**
     * Livewire callback events
     * @var array
     */
    protected $listeners = [
        'resetThirdParty' => 'resetCropper',
    ];

    /**
     * Define default configuration of Cropper
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
        ?string $value = '',
        ?array $config = []
    ) {
        $this->value = $value;
        $this->component_id = 'cropper-' . uniqid();

        if (!empty($config)) {
            $this->cropper_config = $config;
        } else {
            $this->cropper_config = self::defaultConfig();
        }
    }

    /**
     * When cropper is changed, this component will
     * Notify other component with "updatedCropper" event
     *
     * @param  string $value
     * @return void
     */
    public function updatedValue($value)
    {
        $this->dispatch('updatedCropper', $value);
    }

    /**
     * Apply cropper event
     *
     * @return void
     */
    public function apply()
    {
        $this->dispatch('apply-cropper');
    }

    public function render()
    {
        return view('common::livewire.utils.avatar-cropper');
    }
}
