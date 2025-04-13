<?php

namespace Modules\Administrator\Livewire\Testimonial;

use Exception;
use Livewire\Component;
use Modules\Common\Contracts\WithThirdParty;
use Modules\Common\Models\Testimonial;
use Modules\Common\Traits\Utils\FlashMessage;

class Create extends Component
{
    use WithThirdParty, FlashMessage;

    /**
     * Define integer props
     * @var int
     */
    public ?int $rate;

    /**
     * Define string props
     * @var string
     */
    public ?string $avatar = '';
    public ?string $name = '';
    public ?string $message = '';

    /**
     * Define bool props
     * @var bool
     */
    public ?bool $show_in_homepage = true;

    /**
     * Define event listeners
     *
     * @var array
     */
    public $listeners = [
        self::UPDATED_FILEPOND,
    ];

    /**
     * Set validation rules
     *
     * @var array
     */
    protected function rules()
    {
        return [
            'avatar' => 'required',
            'name' => 'required|max:191|unique:testimonials',
            'rate' => 'required',
            'message' => 'required',
            'show_in_homepage' => 'nullable|boolean',
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
        'avatar' => 'Avatar',
        'name' => 'Nama',
        'rate' => 'Rating',
        'message' => 'Komentar',
        'show_in_homepage' => 'Status',
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
            // $this->alt = $value;
        }
    }

    /**
     * Hooks for avatar property
     * When image-upload has been updated,
     * avatar property will be update
     *
     * @param  string $value
     * @return void
     */
    public function updatedFilepond($value)
    {
        $this->avatar = $value;
    }

    /**
     * Store slider data to database
     *
     * @return void
     */
    public function store()
    {
        $this->validate();

        $data = [
            'rate' => $this->rate,
            'name' => $this->name,
            'message' => $this->message,
            'show_in_hoempage' => $this->show_in_homepage ? 1 : 0,
        ];

        if ($this->avatar) {
            $data['avatar'] = $this->avatar;
        }

        try {
            Testimonial::create($data);
            $this->reset();

            // Reset third party
            $this->resetThirdParty();

            return $this->dispatchSuccess('Testimoni berhasil ditambahkan.');
        } catch (Exception $exception) {
            return $this->dispatchError($exception->getMessage());
        }
    }

    public function render()
    {
        return view('administrator::livewire.testimonial.create');
    }
}
