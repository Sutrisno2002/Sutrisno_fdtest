<?php

namespace Modules\Administrator\Livewire\Slider;

use App\Livewire\Component\Filepond\Image;
use Exception;
use Illuminate\Support\Str;
use Livewire\Component;
use Modules\Common\Constants\BackgroundPosition;
use Modules\Common\Contracts\WithThirdParty;
use Modules\Common\Models\Slider;
use Modules\Common\Traits\Utils\FlashMessage;

class Create extends Component
{
    use WithThirdParty, FlashMessage;

    /**
     * Define string props
     * @var string
     */
    public ?string $thumbnail = '';
    public ?string $type = 'image';
    public ?string $name = '';
    public ?string $description = '';
    public ?string $alt = '';
    public ?string $reference_url = '';
    public ?string $position = '';
    public ?string $background_position = '';
    public ?string $caption_title = '';
    public ?string $caption_text = '';
    public ?string $button_text = '';
    public ?string $button_link = '';

    /**
     * Define bool props
     * @var bool
     */
    public ?bool $with_caption = false;
    public ?bool $with_button = false;
    public ?bool $is_active = true;

    public $backgroundPositions = [], $pluckBackgroundPositions = null;

    /**
     * Define event listeners
     *
     * @var array
     */
    public $listeners = [
        self::UPDATED_FILEPOND,
    ];

    public function mount()
    {
        $backgroundPositions = BackgroundPosition::all();
        $this->backgroundPositions = $backgroundPositions;

        $pluckBackgroundPositions = array_map(function ($position) {
            return $position['value'];
        }, $backgroundPositions);

        $this->pluckBackgroundPositions = implode(',', $pluckBackgroundPositions);
    }

    /**
     * Set validation rules
     *
     * @var array
     */
    protected function rules()
    {
        return [
            'thumbnail' => 'required',
            'name' => 'required|max:191|unique:sliders',
            'description' => 'nullable',
            'alt' => 'nullable|max:191',
            'reference_url' => 'nullable|url',
            'is_active' => 'nullable|boolean',
            'background_position' => 'nullable|max:191|in:' . $this->pluckBackgroundPositions,
            'caption_title' => 'nullable|max:191',
            'caption_text' => 'nullable|max:500',
            'button_text' => 'nullable|max:191',
            'button_link' => 'nullable|max:191',
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
        'thumbnail' => 'Thumbnail',
        'name' => 'Nama',
        'description' => 'Deskripsi',
        'alt' => 'Text Alt',
        'reference_url' => 'Referensi URL',
        'is_active' => 'Status',
        'background_position' => 'Posisi Background',
        'caption_title' => 'Judul Caption',
        'caption_text' => 'Deskripsi Caption',
        'button_text' => 'Text Button',
        'button_link' => 'Link Button',
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
            $this->alt = $value;
        }
    }

    /**
     * Hooks for thumbnail property
     * When image-upload has been updated,
     * Thumbnail property will be update
     *
     * @param  string $value
     * @return void
     */
    public function updatedFilepond($value)
    {
        $this->thumbnail = $value;
    }

    /**
     * Store slider data to database
     *
     * @return void
     */
    public function store()
    {
        $this->validate();

        $latestPosition = Slider::orderBy('position', 'desc')->first(['position']);

        $data = [
            'banner_type' => $this->type,
            'name' => $this->name,
            'description' => $this->description,
            'alt' => $this->alt,
            'placement_route' => 'homepage',
            'references_url' => $this->reference_url,
            'position' => $latestPosition ? $latestPosition->position + 1 : 1,
            'is_active' => $this->is_active ? 1 : 0,
            'desktop_background_position' => $this->background_position ?: null,
            'with_caption' => $this->with_caption ? 1 : 0,
            'caption_title' => $this->caption_title,
            'caption_text' => $this->caption_text,
            'with_button' => $this->with_button ? 1 : 0,
            'button_text' => $this->button_text,
            'button_link' => $this->button_link,
        ];

        if ($this->thumbnail) {
            $data['desktop_media_path'] = $this->thumbnail;
            $data['mobile_media_path'] = $this->thumbnail;
        }

        try {
            Slider::create($data);
            $this->reset();

            // Reset third party
            $this->resetThirdParty();

            return $this->dispatchSuccess('Slider berhasil ditambahkan.');
        } catch (Exception $exception) {
            return $this->dispatchError($exception->getMessage());
        }
    }

    public function render()
    {
        return view('administrator::livewire.slider.create', []);
    }
}
