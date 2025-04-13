<?php

namespace Modules\Administrator\Livewire\PostCategory;

use Exception;
use Livewire\Component;
use Modules\Common\Contracts\WithModal;
use Modules\Common\Models\Category;
use Modules\Common\Services\Repositories\CategoryRepo;
use Modules\Common\Traits\Utils\FlashMessage;

class Create extends Component
{
    use WithModal, FlashMessage;

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
    public ?int $category = null;
    public ?int $sort_order = null;

    /**
     * Define bool props
     * @var bool
     */
    public ?bool $status = true;
    public ?bool $is_featured = false;

    /**
     * Define livewire event listeners
     * @var array
     */
    protected $listeners = [
        'createSubCategory',
        self::INIT_MODAL,
        self::CLOSE_MODAL,
    ];

    /**
     * Set validation rules
     * @var array
     */
    protected function rules()
    {
        return [
            'name' => 'required|max:191',
            'slug' => 'required|max:191',
            'description' => 'nullable',
            'parent_id' => 'nullable',
            'status' => 'nullable',
            'is_featured' => 'nullable',
            'group' => 'nullable',
        ];
    }

    /**
     * Set validation messages
     * @var array
     */
    protected $messages = [
        '*.required' => ':attribute tidak boleh kosong',
        '*.min' => 'form :attribute min. :min karakter',
        '*.max' => 'form :attribute maks. :max karakter',
    ];

    /**
     * Set validation attributes
     * @var array
     */
    protected $validationAttributes = [
        'name' => 'Nama',
        'slug' => 'Slug',
        'description' => 'Deskripsi',
        'parent_id' => 'Induk',
        'status' => 'Status',
        'is_featured' => 'Unggulan',
    ];

    /**
     * Define props before component rendered
     *
     * @param  string|null $parent_id
     * @return void
     */
    public function mount(?string $parent_id = null)
    {
        // Get categories names
        $categories = Category::all();
        $pluckCategories = array_map(function ($category) {
            return $category['id'];
        }, $categories->toArray());

        $this->category = $parent_id;
        $this->pluckCategories = implode(',', $pluckCategories);
    }

    /**
     * Hooks for "createSubCategory" event
     * This action will be run
     *
     * @param  string $parent_id
     * @return void
     */
    public function createSubCategory($parent_id)
    {
        $this->loading = false;
        $this->parent_id = $parent_id;
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
     * Store category data to database
     * @return void
     */
    public function store()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'parent_id' => $this->parent_id ?: null,
            'status' => $this->status ? 1 : 0,
            'is_featured' => $this->is_featured ? 1 : 0,
            'sort_order' => $this->is_featured ? 1 : 0,
            'group' => $this->group,
            'created_by' => user('id'),
        ];

        try {
            if ($this->parent_id) {
                //When parent id was not null, will be create sub category
                $childLastPosition = (new CategoryRepo())->getChildLastPosition((object) [
                    'group' => $this->group,
                    'category' => $this->parent_id,
                ]);

                $data['sort_order'] = $childLastPosition ? $childLastPosition->sort_order + 1 : 1;
                $data['parent_id'] = $this->parent_id;

            } else {
                // Else create category
                $parentLastPosition = (new CategoryRepo())->getParentLastPosition((object) [
                    'group' => $this->group,
                    'category' => $this->category,
                ]);

                $data['sort_order'] = $parentLastPosition ? $parentLastPosition->sort_order + 1 : 1;
                $data['parent_id'] = null;
            }

            Category::create($data);
            $this->reset();

            return $this->dispatchSuccess('Kategori artikel berhasil ditambahkan.');
        } catch (Exception $exception) {
            return $this->dispatchError($exception->getMessage());
        }
    }

    public function render()
    {
        return view('administrator::livewire.post-category.create');
    }
}
