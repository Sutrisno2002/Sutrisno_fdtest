<?php

namespace Modules\Administrator\Livewire\Gallery;

use Exception;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Modules\Common\Contracts\WithRemoveModal;
use Modules\Common\Traits\Utils\FlashMessage;
use Modules\Volunteers\Models\Gallery;
use Modules\Volunteers\Models\GalleryImages;

class Detail extends Component
{
    use WithRemoveModal, FlashMessage;
    /**
     * Define member props
     * @var Member $member
     */
    public Gallery $gallery;

    /**
     * Define query string props
     *
     * @var string
     */
    public $data;
    public $destroyId;

    /**
     * Define livewire event listeners
     * @var array
     */
    protected $listeners = [
        self::CANCEL,
        self::DESTROY,
        self::FLASH => '$refresh',
    ];

    /**
     * Livewire hook for detail gallery view
     *
     * @param  string $id
     * @return void
     */
    public function mount($gallery)
    {
        $this->data = $gallery;
    }

    /**
     * Updated callback
     * Listen from another component event
     *
     * @return void
     */
    public function updated($property = null, $value = null)
    {
        if ($property !== 'destroyId') {
            $this->resetPage();
        }

        if ($property && !$value) {
            $this->reset($property);
        }
    }

    /**
     * Destroy page from resource
     *
     * @return void
     */
    public function destroy()
    {
        try {
            $image = GalleryImages::find($this->destroyId);

            if (!$image) {
                throw new Exception('Gambar tidak ditemukan, gambar gagal dihapus.');
            }

            $path = 'images/gallery/';
            $files = Storage::disk('public')->files($path);
            
            foreach ($files as $file) {
                if (str_contains($file, $image->key)) {
                    Storage::disk('public')->delete($file);
                }
            }

            $image->forceDelete();

            $this->reset('destroyId');

            return $this->dispatchSuccess('Gambar berhasil dihapus.', true);
        } catch (Exception $exception) {
            $this->reset('destroyId');
            return $this->dispatchError($exception->getMessage(), true);
        }
    }

    public function render()
    {
        return view('administrator::livewire.gallery.detail');
    }
}
