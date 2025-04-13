<?php

namespace Modules\Core\Http\Livewire\Component;

use Livewire\Component;

class Editor extends Component
{
    const EVENT_VALUE_UPDATED = 'editor_value_updated';
    const ELEMENT_VALUE_UPDATED = 'element_value_updated';

    public $value;
    public $elementName;
    public $component_id;

    protected $listeners = [
        'resetEditor' => 'resetEditor',
    ];

    public function mount($name = '', $value = '')
    {
        $this->value = $value;
        $this->component_id = 'editor-' . uniqid();

        if ($name) {
            $this->elementName = $name;
        }

    }

    public function init()
    {
        $this->component_loaded = true;
    }

    public function initEditor()
    {
        $this->dispatch('init_editor');
    }

    public function updatedValue($value)
    {
        if ($this->elementName) {
            $data = [
                'element_name' => $this->elementName,
                'value' => $value,
            ];
            $this->emit(self::EVENT_VALUE_UPDATED, $data);
        } else {
            $this->emit(self::EVENT_VALUE_UPDATED, $value);
        }
    }

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
        return view('livewire.component.editor');
    }
}
