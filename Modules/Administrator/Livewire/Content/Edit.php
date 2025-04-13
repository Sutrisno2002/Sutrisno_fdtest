<?php

namespace Modules\Administrator\Livewire\Content;

use Exception;
use Livewire\Component;
use Modules\Common\Contracts\WithThirdParty;
use Modules\Common\Models\Content;
use Modules\Common\Services\ImageService;
use Modules\Common\Services\Repositories\ContentRepo;
use Modules\Common\Traits\Utils\FlashMessage;

class Edit extends Component
{
    use WithThirdParty, FlashMessage;

    /**
     * Define string props
     * @var Content $setting
     */
    public Content $setting;

    /**
     * Define string props
     * @var int
     */
    public ?int $setting_id;

    /**
     * Define string props
     * @var string
     */
    public ?string $slug_group = '';
    public ?string $key = '';
    public ?string $label = '';
    public ?string $value = '';
    public ?string $oldValue = '';
    public ?string $type = '';
    public ?string $form_type = '';

    /**
     * Define event listeners
     * @var array
     */
    public $listeners = [
        self::UPDATED_TAGIFY_TAG,
        self::UPDATED_EDITOR,
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
            'slug_group' => 'required|max:191',
            'key' => 'required|max:191',
            'type' => 'required|max:191|in:image,input,textarea,editor',
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
        'label.regex' => 'format :attribute tidak diperbolehkan. :attribute hanya diperbolehkan huruf.',
        'price.regex' => 'format :attribute tidak diperbolehkan. :attribute hanya diperbolehkan angka.',
    ];

    /**
     * Set validation attributes label
     *
     * @var array
     */
    protected $validationAttributes = [
        'slug_group' => 'Group',
        'key' => 'Key',
        'label' => 'Label',
        'value' => 'Value',
        'type' => 'Type',
    ];

    /**
     * Define props value before component rendered
     *
     * @param  int $content
     * @return void
     */
    public function mount(?int $content)
    {
        try {
            $setting = Content::find($content);

            if (!$setting) {
                throw new Exception('Pangaturan tidak ditemukan, pengaturan gagal di-edit.');
            }

            $this->setting = $setting;
            $this->setting_id = $setting->id;
            $this->slug_group = $setting->slug_group;
            $this->key = $setting->key;
            $this->label = $setting->label;
            $this->value = $setting->type == 'input' || $setting->type == 'textarea' || $setting->type == 'editor' ? $setting->value : null;
            $this->oldValue = $setting->type == 'image' ? $setting->value : null;
            $this->type = $setting->type;
            $this->form_type = $setting->form_type;
        } catch (Exception $exception) {
            return $this->dispatchError($exception->getMessage());
        }
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
        if ($property == 'key') {
            $this->label = title(unslug($value));
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
        $this->value = $value;
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
        $this->value = $value;
    }

    /**
     * Hooks for tags property
     * When tags has been updated,
     * Tags property will be update
     *
     * @param  string $value
     * @return void
     */
    public function updatedTagifyTag($value)
    {
        $this->value = $value;
    }

    /**
     * Get all slug_groups from database
     *
     * @return Content
     */
    public function getGroups()
    {
        return (new ContentRepo())->getGroupField();
    }

    /**
     * Update Content data to database
     *
     * @return void
     */
    public function update()
    {
        $validate = $this->rules();
        $validate['value'] = $this->type == 'image' ? 'nullable' : 'required';

        $this->validate($validate);

        $data = [
            'value' => null,
        ];

        try {
            if ($this->value) {
                $data['value'] = $this->value;
            }

            if ($this->value && $this->type == 'image') {
                (new ImageService)->removeImage('images', $this->oldValue);
            }

            $this->setting->update($data);
            return $this->dispatchSuccess('Pengaturan berhasil diperbarui.');
        } catch (Exception $exception) {
            return $this->dispatchError($exception->getMessage());
        }
    }

    public function render()
    {
        return view('administrator::livewire.content.edit', [
            'groups' => self::getGroups()
        ]);
    }
}
