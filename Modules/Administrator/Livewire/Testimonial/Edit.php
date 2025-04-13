<?php

namespace Modules\Administrator\Livewire\Testimonial;

use Exception;
use Livewire\Component;
use Modules\Common\Contracts\WithThirdParty;
use Modules\Common\Models\Testimonial;
use Modules\Common\Services\ImageService;
use Modules\Common\Traits\Utils\FlashMessage;

class Edit extends Component
{
    use WithThirdParty, FlashMessage;

    /**
     * Define integer props
     * @var Testimonial
     */
    public Testimonial $testimonial;

    /**
     * Define integer props
     * @var int
     */
    public ?int $rate;
    public ?int $testimonial_id;

    /**
     * Define string props
     * @var string
     */
    public ?string $avatar = '';
    public ?string $oldAvatar;
    public ?string $name = '';
    public ?string $message = '';

    /**
     * Define bool props
     * @var bool
     */
    public ?bool $show_in_homepage;

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
            'avatar' => 'nullable',
            'name' => 'required|max:191,id,' . $this->testimonial_id . ',id',
            'rate' => 'required',
            'message' => 'required',
            'show_in_homepage' => 'required|boolean',
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
     * Define props value before component rendered
     *
     * @return void
     */
    public function mount(Testimonial $testimonial)
    {
        $this->testimonial_id = $testimonial->id;
        $this->name = $testimonial->name;
        $this->message = $testimonial->message;
        $this->rate = $testimonial->rating;
        $this->oldAvatar = $testimonial->avatar;
        $this->show_in_homepage = $testimonial->show_in_homepage;
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
    public function update()
    {
        $this->validate();

        $data = [
            'rating' => $this->rate,
            'name' => $this->name,
            'message' => $this->message,
            'show_in_homepage' => $this->show_in_homepage ? 1 : 0,
        ];

        if ($this->avatar) {
            $data['avatar'] = $this->avatar;
        }

        try {
            $this->testimonial->update($data);

            if ($this->avatar) {
                (new ImageService)->removeImage('images', $this->oldAvatar);
            }

            return $this->dispatchSuccess('Testimoni berhasil diperbarui.');
        } catch (Exception $exception) {
            return $this->dispatchError($exception->getMessage());
        }
    }

    public function render()
    {
        return view('administrator::livewire.testimonial.edit', []);
    }
}
