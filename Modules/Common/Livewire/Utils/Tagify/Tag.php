<?php

namespace Modules\Common\Livewire\Utils\Tagify;

use Livewire\Component;

class Tag extends Component
{
    /**
     * Defines string properties
     * @var string
     */
    public ?string $placeholder = '';
    public ?string $value = '';
    public ?string $component_id = '';

    /**
     * Defines array properties
     * @var array
     */
    public ?array $config = [];

    /**
     * Livewire callback events
     * @var array
     */
    protected $listeners = [
        'resetThirdParty' => 'resetTagifyTag',
    ];

    /**
     * Define default configuration of Tagify Tag
     *
     * @param array $whitelist
     * @param string $placeholder
     * @return array
     */
    public function defaultConfig(
        ?array $whitelist,
        ?string $placeholder
    ) {
        $config = [
            'whitelist' => $whitelist,
            'enforceWhitelist' => !empty($whitelist) ? true : false,
            'skipInvalid' => true,
            'placeholder' => $placeholder,
        ];

        if (!empty($whitelist)) {
            $config['dropdown'] = [
                'maxItems' => 20,
                'classname' => "tags-look",
                'enabled' => 0, // <- show
                'closeOnSelect' => false, // <- do not hide the suggestions dropdown once an item has been selected
            ];
        }
        return $config;
    }

    /**
     * Set default value before component rendered
     *
     * @param  string|null $value
     * @param  array|null $whitelist
     * @param  string|null $placeholder
     * @return void
     */
    public function mount(
        ?string $value = '',
        ?array $whitelist = [],
        ?string $placeholder = 'Mau cari apa?'
    ) {
        $this->value = $value;
        $this->placeholder = $placeholder;
        $this->component_id = 'tag-' . uniqid();
        $this->config = self::defaultConfig($whitelist, $placeholder);
    }

    /**
     * Init tag when component is rendered
     * @return void
     */
    public function initTag()
    {
        $this->dispatch('init-tag');
    }

    /**
     * When tag is changed, this component will
     * Notify other component with "updatedTag" event
     *
     * @param  ?string $value
     * @return void
     */
    public function updatedValue(?string $value)
    {
        $this->dispatch('updatedTagifyTag', $value);
    }

    /**
     * When reset tag method was triggered
     * This component will notify other components with "resetTagifyTag" event
     * And all data inside "value" property will be destroyed
     *
     * @return void
     */
    public function resetTagifyTag()
    {
        $this->reset('value');
        $this->dispatch('resetTagifyTag', [
            'target' => $this->component_id,
            'input' => 'input#' . $this->component_id,
        ]);
    }

    public function render()
    {
        return view('common::livewire.utils.tagify.tag');
    }
}
