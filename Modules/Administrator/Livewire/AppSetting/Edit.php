<?php

namespace Modules\Administrator\Livewire\AppSetting;

use Exception;
use Livewire\Component;
use Modules\Common\Contracts\WithThirdParty;
use Modules\Common\Models\AppSetting;
use Modules\Common\Services\ImageService;
use Modules\Common\Services\Repositories\AppSettingRepo;
use Modules\Common\Traits\Utils\FlashMessage;

class Edit extends Component
{
    use WithThirdParty, FlashMessage;

    /**
     * Define string props
     * @var AppSetting $setting
     */
    public AppSetting $setting;

    /**
     * Define string props
     * @var int
     */
    public ?int $setting_id;

    /**
     * Define string props
     * @var string
     */
    public ?string $group = '';
    public ?string $key = '';
    public ?string $name = '';
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
            'group' => 'required|max:191',
            'key' => 'required|max:191',
            'type' => 'required|max:191|in:image,input,input:checkbox,input:number,textarea,editor',
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
        'group' => 'Group',
        'key' => 'Key',
        'name' => 'Label',
        'value' => 'Value',
        'type' => 'Type',
    ];

    /**
     * Define props value before component rendered
     *
     * @param  int $appSetting
     * @return void
     */
    public function mount(?int $appSetting)
    {
        try {
            $setting = AppSetting::find($appSetting);

            if (!$setting) {
                throw new Exception('Pangaturan tidak ditemukan, pengaturan gagal di-edit.');
            }

            $this->setting = $setting;
            $this->setting_id = $setting->id;
            $this->group = $setting->group;
            $this->key = $setting->key;
            $this->name = $setting->name;
            $this->value = $setting->value ?: null;
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
            $this->name = title(unslug($value));
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
     * Get all groups from database
     *
     * @return AppSetting
     */
    public function getGroups()
    {
        return (new AppSettingRepo())->getGroupField();
    }

    /**
     * Update AppSetting data to database
     *
     * @return void
     */
    public function update()
    {
        $validate = $this->rules();
        $rules = $this->type == 'image' || $this->type == 'input:checkbox' || $this->type == 'input:number';
        $validate['value'] = $rules ? 'nullable' : 'required';

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
        return view('administrator::livewire.app-setting.edit');
    }
}
