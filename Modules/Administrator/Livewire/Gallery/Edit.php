<?php

namespace Modules\Administrator\Livewire\Gallery;

use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Common\Contracts\WithThirdParty;
use Modules\Common\Traits\Utils\FlashMessage;
use Modules\Volunteers\Models\Gallery;
use Modules\Volunteers\Models\GalleryImages;

class Edit extends Component
{
    use WithFileUploads, WithThirdParty, FlashMessage;

    public $gallery;
    /**
     * Define query string props
     *
     * @var string
     */
    public $id;
    public $title;
    public $slug;
    public $description;
    public $date;

    /**
     * Define event listeners
     *
     * @var array
     */
    public $listeners = [
        self::UPDATED_EDITOR,
    ];
    public $oldImage = [];
    public $deletedImage = [];
    public $newImage = [];

    /**
     * Set validation rules
     *
     * @var array
     */
    protected function rules()
    {
        return [
            'title' => 'required|max:191|unique:gallery,title,' . $this->id,
            'slug' => 'required|max:191|unique:gallery,slug,' . $this->id,
            'date' => 'required',
            'description' => 'nullable',
        ];
    }

    /**
     * Set validation messages
     *
     * @var array
     */
    protected $messages = [
        '*.required' => ':attribute tidak boleh kosong',
        '*.min' => 'form :attribute min. :min karakter',
        '*.max' => 'form :attribute maks. :max karakter',
        '*.unique' => ':Attribute sudah pernah digunakan',
        '*.boolean' => 'form :attribute tidak valid',
    ];

    /**
     * Set validation attributes name
     *
     * @var array
     */
    protected $validationAttributes = [
        'title' => 'Nama Kegiatan',
        'slug' => 'Slug',
        'date' => 'Tanggal Kegiatan',
        'description' => 'Deskripsi',
    ];


    /**
     * Define props value before component rendered
     *
     * @return void
     */
    public function mount($gallery)
    {
        $this->gallery = $gallery;

        $this->id = $gallery->id;
        $this->title = $gallery->title;
        $this->slug = $gallery->slug;
        $this->date = Carbon::parse($gallery->date)->toDateString();
        $this->description = $gallery->description;
        $this->oldImage = $gallery->images;
    }

    /**
     * Livewire hooks, when search props has been updated
     * This method will be running
     *
     * @param  string $value
     * @return void
     */
    public function updated($property, $value)
    {
        if ($property === "title") {
            $this->slug = slug($value);
        }
    }

    /**
     * Hooks for description property
     * When editor editor has been updated,
     * Description property will be update
     *
     * @param  string $value
     * @return void
     */
    public function updatedEditor($value)
    {
        $this->description = $value;
    }

    public function deleteItem($index)
    {
        // array_splice($this->gallery, $index);
        unset($this->gallery[$index]);

        // Re-indexing array setelah item dihapus agar tidak ada celah
        $this->gallery = array_values($this->gallery);
    }

    public function deleteImage($value)
    {
        array_push($this->deletedImage, $value);
    }

    /**
     * Update page data to database
     *
     * @return void
     */
    public function update()
    {
        $this->validate();

        $data = [
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'date' => $this->date,
        ];

        try {
            $gallery = Gallery::find($this->id);

            $path = 'images/gallery/';
            $files = Storage::disk('public')->files($path);
            
            foreach ($this->deletedImage as $deletedFile) {
                foreach ($files as $file) {
                    if (str_contains($file, $deletedFile)) {
                        Storage::disk('public')->delete($file);
                    }
                }
                GalleryImages::where('key', $deletedFile)->delete();
            }

            if ($this->newImage) {
                foreach ($this->newImage as $item) {
                    $key = rand(1, 9999999);
                    $storeName = $this->id . '-' . $key . '.' . $item->extension();
                    $item->storeAs('images/gallery', $storeName, 'public');
    
                    $itemName = '/storage/images/gallery/' . $storeName;
                    GalleryImages::create([
                        'id' => GalleryImages::generateId(),
                        'key' => $key,
                        'gallery_id' => $this->id,
                        'path' => $itemName
                    ]);
                }
            }

            $gallery->update($data);

            $this->resetThirdParty();
            $this->newImage = [];
            $this->oldImage = GalleryImages::where('gallery_id', $this->id)->get();
            
            return $this->dispatchSuccess('Galeri berhasil dirubah.');
        } catch (Exception $exception) {
            return $this->dispatchError($exception->getMessage());
        }
    }

    public function render()
    {
        return view('administrator::livewire.gallery.edit');
    }
}
