<?php

namespace Modules\Administrator\Livewire\Category;

use Exception;
use Livewire\Component;
use Modules\Common\Models\Category;

class Edit extends Component
{
    /**
     * Define query string props
     *
     * @var string
     */
    public $category;
    public $category_id;
    public $gallery_id;
    public $name;
    public $slug;
    public $description;
    public $icon;
    public $parent_id;
    public $sort_order;
    public $status;
    public $is_featured = false;
    public $table_reference;
    public $language_id;

    /**
     * Define data props
     *
     * @var array
     */
    public $pluckCategories = [];

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
            'parent_id' => 'nullable|in:' . $this->pluckCategories,
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
     * Set validation attributes name
     *
     * @var array
     */
    protected $validationAttributes = [
        'name' => 'Nama',
        'slug' => 'Slug',
        'description' => 'Deskripsi',
        'parent_id' => 'Induk',
        'status' => 'Status',
        'is_featured' => 'Unggulan',
        'table_reference' => 'Tabel Referensi',
    ];

    protected $listeners = [
        'editCategory',
    ];

    /**
     * Define props value before component rendered
     *
     * @return void
     */
    public function mount()
    {
        // Get categories names
        $categories = Category::all();
        $pluckCategories = array_map(function ($attribute) {
            return $attribute['id'];
        }, $categories->toArray());

        $this->pluckCategories = implode(',', $pluckCategories);
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
        if ($property == 'name') {
            $this->slug = slug($value);
        }
    }

    public function editCategory($id)
    {
        // Get categories names
        $categories = Category::all();
        $pluckCategories = array_map(function ($attribute) {
            return $attribute['id'];
        }, $categories->toArray());

        $this->pluckCategories = implode(',', $pluckCategories);

        $category = Category::find($id);

        if ($category) {
            $this->category_id = $category->id;
            $this->name = $category->name;
            $this->slug = $category->slug;
            $this->description = $category->description;
            $this->parent_id = $category->parent_id;
            $this->status = $category->status;
            $this->is_featured = $category->is_featured;
            $this->table_reference = $category->table_reference;
        }
    }

    /**
     * Update category data to database
     *
     * @return void
     */
    public function update()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'parent_id' => $this->parent_id ?: null,
            'status' => $this->status ? 1 : 0,
            'is_featured' => $this->is_featured ? 1 : 0,
            'table_reference' => $this->table_reference,
            'updated_by' => user('id'),
        ];

        try {
            $category = Category::find($this->category_id);
            $category->update($data);
            $this->dispatch('administrator::category.table', 'updated');

            return session()->flash('success', 'Produk kategori berhasil diperbarui.');
        } catch (Exception $exception) {
            return session()->flash('error', $exception->getMessage());
        }
    }

    public function render()
    {
        return view('administrator::livewire.category.edit', [
            'categories' => Category::whereNull('parent_id')->get(['id', 'name']),
        ]);
    }
}
