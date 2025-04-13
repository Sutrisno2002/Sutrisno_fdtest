<?php

namespace Modules\Administrator\Livewire\Gallery;

use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Common\Contracts\WithThirdParty;
use Modules\Common\Traits\Utils\FlashMessage;
use Modules\Volunteers\Models\Gallery;
use Modules\Volunteers\Models\GalleryImages;

class Create extends Component
{
    use WithFileUploads, WithThirdParty, FlashMessage;

    /**
     * Define query string props
     *
     * @var string
     */
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
    
    public $gallery = [];

    /**
     * Set validation rules
     *
     * @var array
     */
    protected $rules = [
        'title' => 'required|max:191|unique:gallery,title',
        'slug' => 'required|max:191|unique:gallery,slug',
        'date' => 'required',
        'description' => 'nullable',
        'gallery' => 'required',
    ];

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
        '*.boolean' => 'nilai form :attribute tidak valid',
    ];

    /**
     * Set validation attributes name
     *
     * @var array
     */
    protected $validationAttributes = [
        'title' => 'Nama Kegiatan',
        'slug' => 'Slug',
        'description' => 'Deskripsi Kegiatan',
        'date' => 'Tanggal Kegiatan',
        'gallery' => 'Galeri',
    ];

    /**
     * Livewire hooks, when any props has been updated
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

    /**
     * Store page data to database
     *
     * @return void
     */
    public function store()
    {
        $this->validate();

        $data = [
            'id' => Gallery::generateId(),
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'date' => $this->date,
            'created_by' => user('id'),
        ];

        try {
            Gallery::create($data);

            foreach ($this->gallery as $item) {
                $key = rand(1, 9999999);
                $storeName = $data['id'] . '-' . $key . '.' . $item->extension();
                $item->storeAs('images/gallery', $storeName, 'public');

                $itemName = '/storage/images/gallery/' . $storeName;
                GalleryImages::create([
                    'id' => GalleryImages::generateId(),
                    'key' => $key,
                    'gallery_id' => $data['id'],
                    'path' => $itemName
                ]);
            }
            $this->resetThirdParty();

            $this->reset();
            return $this->dispatchSuccess('Galeri berhasil ditambahkan.');
        } catch (Exception $exception) {
            return $this->dispatchError($exception->getMessage());
        }
    }

    public function render()
    {
        return view('administrator::livewire.gallery.create');
    }
}
