<?php

namespace Modules\Core\Http\Livewire\AppSetting;

use App\Livewire\Component\Editor;
use App\Livewire\Component\Filepond\Image;
use Exception;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;
use Modules\Common\Models\AppSetting;
use Modules\Common\Services\Repositories\AppSettingRepo;

class Edit extends Component
{
    /**
     * Define query string props
     *
     * @var string
     */
    public $appsetting;
    public $appsetting_id;
    public $group;
    public $key;
    public $name;
    public $value;
    public $type;
    public $form_type;

    /**
     * Define event listeners
     *
     * @var array
     */
    public $listeners = [
        Image::EVENT_VALUE_UPDATED,
        Editor::EVENT_VALUE_UPDATED,
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
     * @return void
     */
    public function mount($appsetting)
    {
        $appsetting = (object) $appsetting;
        $this->appsetting_id = $appsetting->id;
        $this->group = $appsetting->group;
        $this->key = $appsetting->key;
        $this->name = $appsetting->name;
        $this->value = $appsetting->type == 'input' ? $appsetting->value : null;
        $this->oldValue = $appsetting->type == 'image' ? $appsetting->value : null;
        $this->type = $appsetting->type;
        $this->form_type = $appsetting->form_type;
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
    public function editor_value_updated($value)
    {
        $this->value = $value;
    }

    /**
     * Hooks for value property
     * When image-upload has been updated,
     * Value property will be update
     *
     * @param  string $value
     * @return void
     */
    public function images_value_updated($value)
    {
        $this->value = $value;
        $this->oldValue = null;
    }

    /**
     * Get all groups from database
     *
     * @return void
     */
    public function getGroups()
    {
        return (new AppSettingRepo())->getGroupField();
    }

    /**
     * Update appsetting data to database
     *
     * @return void
     */
    public function update()
    {
        $validate = $this->rules();
        $validate['value'] = $this->type == 'image' ? 'nullable' : 'required';

        $this->validate($validate);

        $data = [
            'group' => $this->group,
            'key' => $this->key,
            'name' => $this->name,
            'value' => $this->value,
            'type' => $this->type,
            'form_type' => $this->form_type,
        ];

        try {
            $appsetting = AppSetting::find($this->appsetting_id);

            if ($this->value) {
                $data['value'] = $this->value;
            }

            $appsetting->update($data);

            Cache::forget($this->key);
            Cache::forever($this->key, $this->value);
            return session()->flash('success', 'Pengaturan berhasil diperbarui.');
        } catch (Exception $exception) {
            return session()->flash('error', $exception->getMessage());
        }
    }

    public function render()
    {
        return view('core::livewire.app-setting.edit', [
            'groups' => $this->getGroups(),
            'types' => [
                'input', 'image', 'textarea', 'editor',
            ],
        ]);
    }
}
