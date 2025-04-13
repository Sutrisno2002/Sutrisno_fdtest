<?php

namespace Modules\Common\Livewire\Utils;

use Livewire\Component;

class Editor extends Component
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
    public $editor_config = [];

    /**
     * Livewire callback events
     * @var array
     */
    protected $listeners = [
        'resetThirdParty' => 'resetEditor',
    ];

    /**
     * Define default configuration of Foala Editor
     * @return array
     */
    public function defaultConfig()
    {
        return [
            'image' => [
                'upload_url' => route('media.uploadImage'),
                'destroy_url' => route('media.destroyImage'),
                'params' => [
                    '_token' => csrf_token(),
                    'ref' => 'editor',
                ],
            ],
        ];
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
        $this->component_id = 'editor-' . uniqid();

        if (!empty($config)) {
            $this->editor_config = $config;
        } else {
            $this->editor_config = self::defaultConfig();
        }
    }

    /**
     * Init editor when component is rendered
     * @return void
     */
    public function initEditor()
    {
        $this->dispatch('init-editor');
    }

    /**
     * When editor is changed, this component will
     * Notify other component with "updatedEditor" event
     *
     * @param  string $value
     * @return void
     */
    public function updatedValue($value)
    {
        $this->dispatch('updatedEditor', $value);
    }

    /**
     * When reset editor method was triggered
     * This component will notify other components with "resetEditor" event
     * And all data inside "value" property will be destroyed
     *
     * @return void
     */
    public function resetEditor()
    {
        $this->reset('value');
        $this->dispatch('resetEditor', [
            'target' => $this->component_id,
            'input' => 'input#' . $this->component_id,
        ]);
    }

    public function render()
    {
        return view('common::livewire.utils.editor');
    }
}
