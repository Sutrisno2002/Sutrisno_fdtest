<?php

namespace Modules\Common\Contracts;

trait WithModal
{
    /**
     * Livewire event listener for Tailwind Modal Component
     * @var  INIT_MODAL
     */
    const INIT_MODAL = 'initModal';

    /**
     * Livewire event listener for Tailwind Modal Component
     * @var  CLOSE_MODAL
     */
    const CLOSE_MODAL = 'closeModal';

    /**
     * Define query boolean props
     * @var bool
     */
    public bool $loading = true;

    /**
     * Hooks for "initModal" event in the modal component
     * Disable modal loading state
     *
     * @return void
     */
    public function initModal()
    {
        $this->loading = false;
    }

    /**
     * Hooks for "closeModal" event in the modal component
     * Reset modal property value
     *
     * @return void
     */
    public function closeModal()
    {
        $this->resetErrorBag();

        if (property_exists($this, 'reset_except')) {
            $this->except($this->reset_except);
        } else {
            $this->reset();
        }

        return $this->dispatch('cancel');
    }

    // public function except()
    // {
    //     $customProps = array_keys(array_slice(get_class_vars(self::class), 0, -11));
    //     dd($customProps);
    // }
}
