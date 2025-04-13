<?php

namespace Modules\Administrator\Livewire\Navigation;

use Exception;
use Livewire\Component;
use Modules\Common\Constants\Utilities;
use Modules\Common\Models\Navigation;
use Nwidart\Modules\Facades\Module;

class Edit extends Component
{
    /**
     * Define query string props
     *
     * @var string
     */
    public $navigation;
    public $navigation_id;
    public $parent_id;
    public $name;
    public $url;
    public $icon;
    public $active_state = 'active';
    public $module = 'Front';
    public $placement = 'navbar';
    public $is_active = true;

    /**
     * Define data props
     *
     * @var array
     */
    public $pluckNavigations = [];

    /**
     * Set validation rules
     *
     * @var array
     */
    protected function rules()
    {
        return [
            'parent_id' => 'nullable|in:' . $this->pluckNavigations,
            'name' => 'required|max:191',
            'url' => 'required|max:191',
            'icon' => 'nullable|max:191',
            'active_state' => 'nullable|max:191',
            'module' => 'nullable|max:191',
            'placement' => 'nullable|max:191',
            'is_active' => 'nullable|boolean',
        ];
    }

    /**
     * Set validation messages
     *
     * @var array
     */
    protected $messages = [
        '*.required' => ':attribute tidak boleh kosong',
        '*.in' => ':attribute tidak tersedia.',
        '*.max' => 'form :attribute maks. :max karakter',
    ];

    /**
     * Set validation navigations name
     *
     * @var array
     */
    protected $validationNavigations = [
        'parent_id' => 'Navigasi',
        'name' => 'Nama',
        'url' => 'Url',
        'icon' => 'Icon',
        'active_state' => 'Class Active',
        'module' => 'Module',
        'placement' => 'Letak Navigasi',
    ];

    protected $listeners = [
        'editNavigation',
    ];

    /**
     * Define props value before component rendered
     *
     * @return void
     */
    public function mount()
    {
        // Get navigations names
        $navigations = Navigation::all();
        $pluckNavigations = array_map(function ($navigation) {
            return $navigation['id'];
        }, $navigations->toArray());

        $this->pluckNavigations = implode(',', $pluckNavigations);
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
        if ($property == 'name') {
            $this->slug = slug($value);
        }
    }

    public function editNavigation($id)
    {
        // Get navigations names
        $navigations = Navigation::all();
        $pluckNavigations = array_map(function ($attribute) {
            return $attribute['id'];
        }, $navigations->toArray());

        $this->pluckNavigations = implode(',', $pluckNavigations);

        $navigation = Navigation::find($id);

        if ($navigation) {
            $this->navigation_id = $navigation->id;
            $this->parent_id = $navigation->parent_id;
            $this->name = $navigation->name;
            $this->url = $navigation->url;
            $this->icon = $navigation->icon;
            $this->active_state = $navigation->active_state;
            $this->module = $navigation->module;
            $this->placement = $navigation->placement;
            $this->is_active = $navigation->is_active ? true : false;
        }
    }

    /**
     * Update navigation data to database
     *
     * @return void
     */
    public function update()
    {
        $this->validate();

        $data = [
            'parent_id' => $this->parent_id ?: null,
            'name' => $this->name,
            'url' => $this->url,
            'icon' => $this->icon,
            'active_state' => $this->active_state,
            'module' => $this->module,
            'placement' => $this->placement,
            'is_active' => $this->is_active ? 1 : 0,
        ];

        try {
            $navigation = Navigation::find($this->navigation_id);
            $navigation->update($data);
            $this->dispatch('administrator::navigation.table', 'updatedNavigation');

            return session()->flash('success', 'Navigasi berhasil diperbarui.');
        } catch (Exception $exception) {
            return session()->flash('error', $exception->getMessage());
        }
    }

    public function render()
    {
        return view('administrator::livewire.navigation.edit', [
            'modules' => userRole('Developer') ? array_keys(Module::allEnabled()) : ['Front'],
            'placements' => Utilities::NAVIGATION_PLACEMENT,
        ]);
    }
}
