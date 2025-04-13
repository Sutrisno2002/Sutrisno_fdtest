<?php

namespace Modules\Administrator\Livewire\Faq;

use Exception;
use Illuminate\Support\Str;
use Modules\Common\Contracts\WithModal;
use Livewire\Component;
use Modules\Common\Models\Category;
use Modules\Common\Models\Faq;
use Modules\Common\Traits\Utils\FlashMessage;

class Create extends Component
{
    use WithModal, FlashMessage;

    /**
     * Define query string props
     * @var string
     */
    public ?string $category = '';
    public ?string $question = '';
    public ?string $answer = '';

    /**
     * Define query bool props
     * @var bool
     */
    public ?bool $is_active = true;
    public ?bool $is_featured = false;

    /**
     * Set validation rules
     * @var array
     */
    public function rules()
    {
        return [
            'category' => 'nullable',
            'question' => 'required|max:191|regex:/^[a-zA-Z ]*$/',
            'answer' => 'required|min:10',
            'is_active' => 'nullable|boolean',
            'is_featured' => 'nullable|boolean',
        ];
    }

    /**
     * Define livewire event listeners
     * @var array
     */
    protected $listeners = [
        self::INIT_MODAL,
        self::CLOSE_MODAL
    ];

    /**
     * Set validation messages
     * @var array
     */
    protected $messages = [
        '*.required' => ':attribute tidak boleh kosong'
    ];

    /**
     * Set validation attributes question
     * @var array
     */
    protected $validationAttributes = [
        'category' => 'Kategori',
        'question' => 'Pertanyaan',
        'answer' => 'Jawaban',
        'is_active' => 'Status',
        'is_active' => 'Unggulan',
    ];

    /**
     * Define props value before component rendered
     * @return void
     */
    public function mount()
    {
        //
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
        //
    }

    /**
     * When modal initiated, set loading to true
     * @return void
     */
    public function initModal()
    {
        $this->loading = false;
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
     * Store faq data to database
     *
     * @return void
     */
    public function store()
    {
        $this->validate();

        $lastPosition = Faq::orderBy('sort_order', 'desc')->first();

        $data = [
            'id' => Str::random(8),
            'category_id' => $this->category,
            'question' => $this->question,
            'answer' => $this->answer,
            'sort_order' => $lastPosition ? $lastPosition->sort_order + 1 : 1,
            'is_active' => $this->is_active ? 1 : 0,
            'is_featured' => $this->is_featured ? 1 : 0,
        ];

        try {
            Faq::create($data);
            $this->reset();
            $this->dispatch('createdFaq')->to(Table::class);

            return $this->dispatchSuccess('FAQ berhasil ditambahkan');
        } catch (Exception $exception) {
            return $this->dispatchErro('error', $exception->getMessage());
        }
    }

    /**
     * Get all faq categories
     *
     * @return collection
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
        return view('administrator::livewire.faq.create', [
            'categories' => $this->getCategories(),
        ]);
    }
}
