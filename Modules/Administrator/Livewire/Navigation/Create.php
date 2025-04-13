<?php

namespace Modules\Administrator\Livewire\Navigation;

use Exception;
use Livewire\Component;
use Modules\Common\Constants\Utilities;
use Modules\Common\Models\Navigation;
use Modules\Common\Services\Repositories\NavigationRepo;
use Nwidart\Modules\Facades\Module;

class Create extends Component
{
    /**
     * Define query string props
     *
     * @var string
     */
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

    protected $listeners = [
        'createSubNavigation' => 'createSubNavigation',
        'changePlacement' => 'changePlacement',
    ];

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

    /**
     * Define props before component rendered
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

        $this->placement = request()->get('placement');
        $this->pluckNavigations = implode(',', $pluckNavigations);
    }

    public function createSubNavigation($data)
    {
        $this->parent_id = $data['id'];
        $this->placement = $data['placement'];
    }

    public function changePlacement($placement)
    {
        $this->placement = $placement;
    }

    public function updatedName($value)
    {
        $this->url = '/' . slug($value);
    }

    /**
     * Store navigation data to database
     *
     * @return void
     */
    public function store()
    {
        $this->validate();

        $parentLastPosition = (new NavigationRepo())->getParentLastPosition((object) [
            'navigation' => $this->parent_id,
        ]);

        $childLastPosition = (new NavigationRepo())->getChildLastPosition((object) [
            'parent' => $this->parent_id,
        ]);

        $data = [
            'parent_id' => $this->parent_id ?: null,
            'name' => $this->name,
            'url' => $this->url,
            'icon' => $this->icon,
            'active_state' => $this->active_state,
            'module' => $this->module,
            'placement' => $this->placement,
            'is_active' => $this->is_active ? 1 : 0,
            'sort_order' => 0,
        ];

        if ($this->parent_id) {
            $data['sort_order'] = $childLastPosition ? $childLastPosition->sort_order + 1 : 1;
            $data['parent_id'] = $this->parent_id;
        } else {
            $data['sort_order'] = $parentLastPosition ? $parentLastPosition->sort_order + 1 : 1;
            $data['parent_id'] = null;
        }

        try {
            Navigation::create($data);
            $this->dispatch('administrator::navigation.table', 'createdNavigation');
            $this->reset(
                'parent_id',
                'name',
                'url',
                'icon',
                'active_state',
                'is_active',
            );

            return session()->flash('success', 'Navigasi berhasil ditambahkan.');
        } catch (Exception $exception) {
            return session()->flash('error', $exception->getMessage());
        }
    }

    public function render()
    {
        return view('administrator::livewire.navigation.create', [
            'modules' => userRole('Developer') ? array_keys(Module::allEnabled()) : ['Front'],
            'placements' => Utilities::NAVIGATION_PLACEMENT,
        ]);
    }
}
