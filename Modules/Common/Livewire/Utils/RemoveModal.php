<?php

namespace Modules\Common\Livewire\Utils;

use Livewire\Component;

class RemoveModal extends Component
{
    /**
     * Trigger "cancelDestroy" event
     * @return void
     */
    public function cancelDestroy()
    {
        return $this->dispatch('cancelDestroy');
    }

    /**
     * Trigger "destroy" event
     * @return void
     */
    public function destroyData()
    {
        return $this->dispatch('destroy');
    }

    public function render()
    {
        return view('common::livewire.utils.remove-modal');
    }
}
