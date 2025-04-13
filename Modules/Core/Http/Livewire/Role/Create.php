<?php

namespace Modules\Core\Http\Livewire\Role;

use Exception;
use Livewire\Component;
use Modules\Core\Services\Repositories\PermissionRepo;
use Spatie\Permission\Models\Role;

class Create extends Component
{
    /**
     * Define query string props
     *
     * @var string
     */
    public $name;
    public $guard_name = 'web';
    public $groups;
    public $permissions;

    /**
     * Set validation rules
     *
     * @var array
     */
    protected $rules = [
        'name' => 'required|max:191|regex:/^[a-zA-Z ]*$/',
    ];

    /**
     * Set validation messages
     *
     * @var array
     */
    protected $messages = [
        '*.required' => ':attribute tidak boleh kosong',
        '*.max' => 'form :attribute maks. :max karakter',
        'name.regex' => 'format :attribute tidak diperbolehkan. :attribute hanya diperbolehkan huruf.',
    ];

    /**
     * Set validation attributes name
     *
     * @var array
     */
    protected $validationAttributes = [
        'name' => 'Nama',
    ];

    /**
     * Define props value before component rendered
     *
     * @return void
     */
    public function mount()
    {
        $this->getPermissions();
    }

    /**
     * Get and set permissions to defined properties
     *
     * @return void
     */
    public function getPermissions()
    {
        $separateByGroup = (new PermissionRepo())->separateByGroups(null, $this->guard_name);
        $this->groups = $separateByGroup['groups'];
        $this->permissions = $separateByGroup['permissionsGroups'];
    }

    /**
     * Livewire hooks, when search props has been updated
     * This method will be running
     *
     * @param  string $component
     * @param  string $value
     * @return void
     */
    public function updated($property, $value)
    {
        $this->getPermissions();
    }

    /**
     * Store role data to database
     *
     * @return void
     */
    public function store()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'guard_name' => $this->guard_name,
        ];

        try {
            $role = Role::create($data);
            // Update permissions
            $permissions = [];
            foreach ($this->permissions as $key => $group) {
                foreach ($group as $permissionKey => $permission) {
                    if ($permission) {
                        array_push($permissions, $permissionKey . '.' . $key);
                    }
                }
            }
            $role->syncPermissions($permissions);

            $this->reset();

            $separateByGroup = (new PermissionRepo())->separateByGroups();
            $this->groups = $separateByGroup['groups'];
            $this->permissions = $separateByGroup['permissionsGroups'];

            return session()->flash('success', 'Role berhasil ditambahkan.');
        } catch (Exception $exception) {
            return session()->flash('error', $exception->getMessage());
        }
    }

    public function render()
    {
        return view('core::livewire.role.create');
    }
}
