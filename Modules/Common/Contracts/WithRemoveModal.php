<?php

namespace Modules\Common\Contracts;

use Livewire\Component;

trait WithRemoveModal
{
    /**
     * Livewire event listener for Tailwind Remove Modal Component
     * @var  CANCEL
     */
    const CANCEL = 'cancelDestroy';

    /**
     * Livewire event listener for Tailwind Remove Modal Component
     * @var  DESTROY
     */
    const DESTROY = 'destroy';

    /**
     * Hooks for modal component
     * Reset modal property value
     *
     * @return void
     */
    public function cancel()
    {
        return $this->dispatch('cancel');
    }

    /**
     * Action when user trigger
     * Cancel button on the remove modal
     *
     * @return void
     */
    public function cancelDestroy()
    {
        return $this->reset('destroyId');
    }
}
