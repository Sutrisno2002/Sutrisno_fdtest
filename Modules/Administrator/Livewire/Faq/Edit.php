<?php

namespace Modules\Administrator\Livewire\Faq;

use Exception;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Modules\Common\Contracts\WithThirdParty;
use Modules\Common\Contracts\WithModal;
use Modules\Common\Models\Category;
use Modules\Common\Models\Faq;
use Modules\Common\Traits\Utils\FlashMessage;

class Edit extends Component
{
    use WithThirdParty, FlashMessage, WithModal;

    /**
     * Define slider props
     * @var Slider $slider
     */
    public Faq $faq;

    /**
     * Define query string props
     *
     * @var string
     */
    public $faq_id;
    public $category;
    public $question;
    public $answer;
    public $is_active = true;
    public $is_featured = true;
    public $pluckCategories;

    /**
     * Set validation rules
     *
     * @var array
     */
    public function rules()
    {
        return [
            'category' => 'nullable|in:' . $this->pluckCategories,
            'question' => 'required|max:191|regex:/^[a-zA-Z ]*$/',
            'answer' => 'required|min:10',
            'is_active' => 'nullable|boolean',
        ];
    }

    /**
     * Set validation messages
     *
     * @var array
     */
    protected $messages = [
        '*.required' => ':attribute tidak boleh kosong'
    ];

    /**
     * Set validation attributes question
     *
     * @var array
     */
    protected $validationAttributes = [
        'category' => 'Kategori',
        'question' => 'Pertanyaan',
        'answer' => 'Jawaban',
        'is_active' => 'Status',
    ];

    /**
     * Define livewire event listeners
     * @var array
     */
    protected $listeners = [
        self::INIT_MODAL,
        self::CLOSE_MODAL,
        'editFaq',
    ];

    /**
     * Edit FAQ callback
     *
     * @param  mixed $id
     * @return void
     */
    public function editFaq($id)
    {
        // Get categories names
        $categories = Category::all();
        $pluckCategories = array_map(function ($attribute) {
            return $attribute['id'];
        }, $categories->toArray());

        $this->pluckCategories = implode(',', $pluckCategories);
        try {
            $faq = Faq::find($id);

            if (!$faq) {
                throw new Exception('Kategori tidak ditemukan, kategori gagal dimuat.');
            }

            $this->faq_id = $faq->id;
            $this->category = $faq->category_id;
            $this->question = $faq->question;
            $this->answer = $faq->answer;
            $this->is_active = $faq->is_active ? true : false;
            $this->is_featured = $faq->is_featured ? true : false;
            $this->loading = false;

            $this->pluckCategories = $this->getCategories()->implode('id', ',');
        } catch (Exception $exception) {
            $this->loading = false;
            return $this->dispatchError($exception->getMessage());
        }
    }

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
     * When modal initiated, set loading to true
     * @return void
     */
    public function initModal()
    {
        $this->loading = true;
    }

    /**
     * When wodal closed, set loading to false and reset order
     * @return void
     */
    public function closeModal()
    {
        $this->loading = false;
    }

    /**
     * Update faq data to database
     *
     * @return void
     */
    public function update()
    {
        $this->validate();

        $data = [
            'category_id' => $this->category,
            'question' => $this->question,
            'answer' => $this->answer,
            'is_active' => $this->is_active ? 1 : 0,
            'is_featured' => $this->is_featured ? 1 : 0,
        ];

        try {
            $faq = Faq::find($this->faq_id);
            $faq->update($data);
            $this->dispatch('updatedFaq')->to(Table::class);
            $this->reset();

            return $this->dispatchSuccess('FAQ berhasil diperbarui.');
        } catch (Exception $exception) {
            return $this->dispatchError($exception->getMessage());
        }
    }

    /**
     * Get all faq categories
     *
     * @return collectionn
     */
    public function getCategories()
    {
        return Category::whereNull('parent_id')
            ->whereNotNull('status')
            ->where('group', 'faqs')
            ->get(['id', 'name']);
    }

    public function render()
    {
        return view('administrator::livewire.faq.edit', [
            'categories' => $this->getCategories(),
        ]);
    }
}