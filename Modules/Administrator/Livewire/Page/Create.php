<?php

namespace Modules\Administrator\Livewire\Page;

use App\Livewire\Component\Editor;
use Exception;
use Livewire\Component;
use Modules\Common\Contracts\WithThirdParty;
use Modules\Common\Models\Page;
use Modules\Common\Traits\Utils\FlashMessage;

class Create extends Component
{
    use WithThirdParty, FlashMessage;

    /**
     * Define query string props
     *
     * @var string
     */
    public $title;
    public $slug;
    public $short_description;
    public $description;
    public $is_active = true;

    /**
     * Define event listeners
     *
     * @var array
     */
    public $listeners = [
        self::UPDATED_EDITOR,
    ];

    /**
     * Set validation rules
     *
     * @var array
     */
    protected $rules = [
        'title' => 'required|max:191|unique:pages,title',
        'slug' => 'required|max:191|unique:pages,slug',
        'short_description' => 'required|max:191',
        'description' => 'required',
        'is_active' => 'nullable|boolean',
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
        'title' => 'Nama Halaman',
        'slug' => 'Slug',
        'short_description' => 'Deskripsi Singkat',
        'description' => 'Konten',
        'is_active' => 'Aktifkan Halaman?',
    ];

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

    /**
     * Store page data to database
     *
     * @return void
     */
    public function store()
    {
        $this->validate();

        $data = [
            'title' => $this->title,
            'slug' => $this->slug,
            'short_description' => $this->short_description,
            'description' => $this->description,
            'created_by' => user('id'),
            'updated_by' => user('id'),
        ];

        try {
            Page::create($data);

            $this->resetThirdParty();
            $this->reset();

            return $this->dispatchSuccess('Halaman berhasil ditambahkan.');
        } catch (Exception $exception) {
            return $this->dispatchError($exception->getMessage());
        }
    }

    public function render()
    {
        return view('administrator::livewire.page.create');
    }
}
