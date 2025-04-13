<?php

namespace Modules\Common\Traits\Utils;

trait FlashMessage
{
    /**
     * Define flash constant
     * @var const FLASH
     */
    const FLASH = 'flash-session';

    /**
     * Notify browser and other components with success message
     * Js will listen for this event
     *
     * @param  ?string $message
     * @param  ?bool $destroyTrigger
     * @return void
     */
    public function dispatchSuccess(?string $message = 'Data berhasil ditambahkan.', ?bool $destroyTrigger = false)
    {
        // Close modal options, assert true if event is triggered by remove modal
        $this->dispatch('close-modal', ['destroy' => $destroyTrigger]);
        return $this->dispatch('flash-session', [
            'status' => 'success',
            'message' => $message,
        ]);
    }

    /**
     * Notify browser and other components with warning message
     * Js will listen for this event
     *
     * @param  ?string $message
     * @param  ?bool $destroyTrigger
     * @return void
     */
    public function dispatchWarning(?string $message = 'Data tidak ditemukan.', ?bool $destroyTrigger = false)
    {
        // Close modal options, assert true if event is triggered by remove modal
        $this->dispatch('close-modal', ['destroy' => $destroyTrigger]);
        return $this->dispatch('flash-session', [
            'status' => 'warning',
            'message' => $message,
        ]);
    }

    /**
     * Notify browser and other components with error message
     * Js will listen for this event
     *
     * @param  ?string $message
     * @param  ?bool $destroyTrigger
     * @return void
     */
    public function dispatchError(?string $message = 'Upss... Sepertinya ada yang salah.', ?bool $destroyTrigger = false)
    {
        // Close modal options, assert true if event is triggered by remove modal
        $this->dispatch('close-modal', ['destroy' => $destroyTrigger]);
        return $this->dispatch('flash-session', [
            'status' => 'error',
            'message' => $message,
        ]);
    }
}
