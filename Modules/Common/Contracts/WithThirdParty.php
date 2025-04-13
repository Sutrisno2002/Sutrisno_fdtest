<?php

namespace Modules\Common\Contracts;

trait WithThirdParty
{
    /**
     * Livewire component event listener for Tagify\Tag Component
     * @uses Modules\Core\Livewire\Utils\Tagify\Tag::class
     * @var  UPDATED_TAGIFY_TAG
     */
    const UPDATED_TAGIFY_TAG = 'updatedTagifyTag';

    /**
     * Livewire component event listener for Editor Component
     * @uses Modules\Core\Livewire\Utils\Filepond::class
     * @var  UPDATED_EDITOR
     */
    const UPDATED_EDITOR = 'updatedEditor';

    /**
     * Livewire component event listener for Filepond Component
     * @uses Modules\Core\Livewire\Utils\Cropper::class
     * @var  UPDATED_CROPPER
     */
    const UPDATED_CROPPER = 'updatedCropper';

    /**
     * Livewire component event listener for Filepond Component
     * @uses Modules\Core\Livewire\Utils\Filepond::class
     * @var  UPDATED_FILEPOND
     */
    const UPDATED_FILEPOND = 'updatedFilepond';

    /**
     * Livewire component event listener for DaterangePicker Component
     * @uses Modules\Core\Livewire\Utils\DaterangePicker::class
     * @var  UPDATED_DATERANGEPICKER
     */
    const UPDATED_DATERANGEPICKER = 'updatedDaterangePicker';

    /**
     * Hooks for Livewire third party property
     * Reset third party to null value
     *
     * @return void
     */
    public function resetThirdParty()
    {
        return $this->dispatch('resetThirdParty');
    }
}
