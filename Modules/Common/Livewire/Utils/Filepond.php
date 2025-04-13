<?php

namespace Modules\Common\Livewire\Utils;

use Illuminate\Support\Facades\File;
use Livewire\Component;

class Filepond extends Component
{
    /**
     * Defines string properties
     * @var string
     */
    public ?string $value = '';
    public ?string $oldValue = '';
    public ?string $uploaded = '';
    public ?string $component_id = '';

    /**
     * Defines bool properties
     * @var bool
     */
    public ?bool $compress = false;

    /**
     * Defines array properties
     * @var array
     */
    public ?array $config = [];
    public ?array $info = [];

    /**
     * Livewire callback events
     * @var array
     */
    protected $listeners = [
        'resetThirdParty' => 'resetFilepond',
    ];

    /**
     * Set default value before component rendered
     *
     * @param  string|null $oldValue
     * @param  array|null $config
     * @return void
     */
    public function mount(?string $oldValue = '', ?array $config = [], $compress = false)
    {
        $this->component_id = 'filepond-' . uniqid();
        $this->oldValue = $oldValue;
        $this->info = self::getFileInfo($oldValue);
        $this->compress = $compress;

        if (!empty($config)) {
            $this->config = $config;
        }
    }

    /**
     * Get file info when in edit mode
     *
     * @param  string|null $uploadedPath
     * @return void
     */
    public function getFileInfo(?string $uploadedPath)
    {
        if (!File::exists(public_path($uploadedPath)) || !$uploadedPath) {
            return [];
        }

        $file = public_path($uploadedPath);
        $size = filesize($file);
        $info = pathinfo($file);

        return [
            'source' => url($uploadedPath),
            'name' => isset($info['basename']) ? $info['basename'] : end(explode('/', $uploadedPath)),
            'size' => $size,
            'poster' => url($uploadedPath),
        ];
    }

    /**
     * Init filepond when component is rendered
     * @return void
     */
    public function initFilepond()
    {
        $this->dispatch('init-filepond');
    }

    /**
     * When filepond is changed, this component will
     * Notify other component with "updatedFilepond" event
     *
     * @param  string $value
     * @return void
     */
    public function updatedValue($value)
    {
        $this->dispatch('updatedFilepond', $value);
    }

    /**
     * When reset filepond method was triggered
     * This component will notify other components with "resetFilepond" event
     * And all data inside "value" property will be destroyed
     *
     * @return void
     */
    public function resetFilepond()
    {
        $this->reset('value');
        $this->dispatch('resetFilepond', [
            'target' => $this->component_id,
            'input' => 'input#' . $this->component_id,
        ]);
    }

    public function render()
    {
        $compress = $this->compress ? ['compress' => 1] : ['compress' => 0];
        return view('common::livewire.utils.filepond', [
            'route' => route('media.uploadImage', $compress),
        ]);
    }
}
