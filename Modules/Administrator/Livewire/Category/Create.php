<?php

namespace Modules\Administrator\Livewire\Category;

use Exception;
use Livewire\Component;
use Modules\Common\Models\Category;
use Modules\Common\Services\Repositories\CategoryRepo;

class Create extends Component
{
    /**
     * Define query string props
     *
     * @var string
     */
    public $gallery_id;
    public $name;
    public $slug;
    public $description;
    public $icon;
    public $parent_id;
    public $sort_order;
    public $status = true;
    public $is_featured = false;
    public $table_reference;
    public $language_id;
    public $category;

    /**
     * Define data props
     *
     * @var array
     */
    public $pluckCategories = [];

    protected $listeners = [
        'createSubCategory' => 'createSubCategory',
    ];

    /**
     * Define props before component rendered
     *
     * @return void
     */
    public function mount($parent_id = null)
    {
        // Get categories names
        $categories = Category::all();
        $pluckCategories = array_map(function ($category) {
            return $category['id'];
        }, $categories->toArray());

        $this->category = $parent_id;
        $this->pluckCategories = implode(',', $pluckCategories);
    }

    public function createSubCategory($parent_id)
    {
        $this->parent_id = $parent_id;
    }

    /**
     * Set validation rules
     *
     * @var array
     */
    protected function rules()
    {
        return [
            // 'gallery_id' => 'nullable',
            'name' => 'required|max:191',
            'slug' => 'required|max:191',
            'description' => 'nullable',
            // 'icon' => 'nullable',
            'parent_id' => 'nullable',
            // 'sort_order' => 'nullable',
            'status' => 'nullable',
            'is_featured' => 'nullable',
            'table_reference' => 'nullable',
            // 'language_id' => 'nullable',
        ];
    }

    /**
     * Set validation messages
     *
     * @var array
     */
    protected $messages = [
        '*.required' => ':attribute tidak boleh kosong',
        '*.email' => 'format :email tidak sesuai',
        '*.min' => 'form :attribute min. :min karakter',
        '*.max' => 'form :attribute maks. :max karakter',
        'name.regex' => 'format :attribute tidak diperbolehkan. :attribute hanya diperbolehkan huruf.',
        'price.regex' => 'format :attribute tidak diperbolehkan. :attribute hanya diperbolehkan angka.',
    ];

    /**
     * Set validation categories name
     *
     * @var array
     */
    protected $validationCategories = [
        'name' => 'Nama',
        'slug' => 'Slug',
        'description' => 'Deskripsi',
        'parent_id' => 'Induk',
        'status' => 'Status',
        'is_featured' => 'Unggulan',
        'table_reference' => 'Tabel Referensi',
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
        if ($property == 'name') {
            $this->slug = slug($value);
        }
    }

    /**
     * Store category data to database
     *
     * @return void
     */
    public function store()
    {
        $this->validate();

        $parentLastPosition = (new CategoryRepo())->getParentLastPosition((object) [
            'category' => $this->category,
        ]);

        $childLastPosition = (new CategoryRepo())->getChildLastPosition((object) [
            'parent' => $this->parent_id,
        ]);

        $data = [
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'parent_id' => $this->parent_id ?: null,
            'status' => $this->status ? 1 : 0,
            'is_featured' => $this->is_featured ? 1 : 0,
            'sort_order' => $this->is_featured ? 1 : 0,
            'table_reference' => $this->table_reference,
            'created_by' => user('id'),
        ];

        if ($this->parent_id) {
            $data['sort_order'] = $childLastPosition ? $childLastPosition->sort_order + 1 : 1;
            $data['parent_id'] = $this->parent_id;
        } else {
            $data['sort_order'] = $parentLastPosition ? $parentLastPosition->sort_order + 1 : 1;
            $data['parent_id'] = null;
        }

        try {
            Category::create($data);
            $this->dispatch('administrator::category.table', 'created');
            $this->reset();

            return session()->flash('success', 'Produk kategori berhasil ditambahkan.');
        } catch (Exception $exception) {
            return session()->flash('error', $exception->getMessage());
        }
    }

    public function render()
    {
        return view('administrator::livewire.category.create', [
            'categories' => Category::whereNull('parent_id')->get(['id', 'name']),
        ]);
    }
}
