<?php

namespace Modules\Administrator\Livewire\PostCategory;

use Exception;
use Livewire\Component;
use Modules\Common\Contracts\WithModal;
use Modules\Common\Models\Category;
use Modules\Common\Traits\Utils\FlashMessage;

class Edit extends Component
{
    use WithModal, FlashMessage;

    /**
     * Define category props
     * @var Category $category
     */
    public Category $category;

    /**
     * Define string props
     * @var string
     */
    public ?string $gallery_id = '';
    public ?string $name = '';
    public ?string $slug = '';
    public ?string $description = '';
    public ?string $icon = '';
    public ?string $parent_id = '';
    public ?string $group = 'posts';
    public ?string $pluckCategories = '';

    /**
     * Define int props
     * @var int
     */
    public ?int $category_id = null;
    public ?int $sort_order = null;

    /**
     * Define bool props
     * @var bool
     */
    public ?bool $status = true;
    public ?bool $is_featured = false;

    /**
     * Set validation rules
     *
     * @var array
     */
    protected function rules()
    {
        return [
            'name' => 'required|max:191',
            'slug' => 'required|max:191',
            'description' => 'nullable',
            'parent_id' => 'nullable|in:' . $this->pluckCategories,
            'status' => 'nullable',
            'is_featured' => 'nullable',
            'group' => 'nullable',
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
        'group' => 'Tabel Referensi',
    ];

    /**
     * Define livewire event listeners
     * @var array
     */
    protected $listeners = [
        'editCategory',
        self::INIT_MODAL,
        self::CLOSE_MODAL,
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
    public function updatedName($value)
    {
        if ($value) {
            return $this->slug = slug($value);
        }

        return $this->reset('slug');
    }

    /**
     * Livewire hook for edit category event
     *
     * @param  int|null $id
     * @return void
     */
    public function editCategory(?int $id)
    {
        // Get categories names
        $categories = Category::all();
        $pluckCategories = array_map(function ($attribute) {
            return $attribute['id'];
        }, $categories->toArray());

        $this->pluckCategories = implode(',', $pluckCategories);

        try {
            $category = Category::find($id);

            if (!$category) {
                throw new Exception('Kategori tidak ditemukan, kategori gagal dimuat.');
            }

            $this->category = $category;
            $this->category_id = $category->id;
            $this->name = $category->name;
            $this->slug = $category->slug;
            $this->description = $category->description;
            $this->parent_id = $category->parent_id;
            $this->status = $category->status;
            $this->is_featured = $category->is_featured;
            $this->group = $category->group;
            $this->loading = false;

        } catch (Exception $exception) {
            $this->loading = false;
            return $this->dispatchError($exception->getMessage());
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
            'group' => $this->group,
            'updated_by' => user('id'),
        ];

        try {
            $category = Category::find($this->category_id);
            $category->update($data);

            return $this->dispatchSuccess('Kategori artikel berhasil diperbarui.');
        } catch (Exception $exception) {
            return $this->dispatchError($exception->getMessage());
        }
    }

    public function render()
    {
        return view('administrator::livewire.post-category.edit', [
            'categories'=> Category::where('group', $this->group)->whereNull('parent_id')->get(['id', 'name'])
        ]);
    }
}
