<?php

namespace Modules\Core\Http\Livewire\Role;

use Exception;
use Livewire\Component;
use Modules\Core\Services\Repositories\PermissionRepo;
use Spatie\Permission\Models\Role;

class Edit extends Component
{
    /**
     * Define query string props
     *
     * @var string
     */
    public $role_id;
    public $name;
    public $guard_name = 'web';
    public $groups;
    public $permissions = [];

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
    public function mount($role)
    {
        $role = Role::find($role['id']);
        $this->role_id = $role->id;
        $this->name = $role->name;
        $this->guard_name = $role->guard_name;

        $rolePermissions = (new PermissionRepo())->separateByGroups($role->permissions);
        $separateByGroup = (new PermissionRepo())->separateByGroups();

        if (!$role->permissions->isEmpty()) {
            $groups = [];
            $permissionsGroups = [];
            foreach ($separateByGroup['permissionsGroups'] as $key => $permissions) {
                if (array_key_exists($key, $rolePermissions['permissionsGroups'])) {
                    if (count($permissions) == count($rolePermissions['permissionsGroups'][$key])) {
                        $groups[$key] = true;
                    } else {
                        $groups[$key] = false;
                    }
                } else {
                    $groups[$key] = false;
                }

                foreach ($permissions as $permissionKey => $permission) {
                    if (array_key_exists($key, $rolePermissions['permissionsGroups'])) {
                        if (array_key_exists($permissionKey, $rolePermissions['permissionsGroups'][$key])) {
                            $permissionsGroups[$key][$permissionKey] = true;
                        } else {
                            $permissionsGroups[$key][$permissionKey] = false;
                        }
                    } else {
                        $permissionsGroups[$key][$permissionKey] = false;
                    }
                }
            }

            $this->groups = $groups;
            $this->permissions = $permissionsGroups;
        } else {
            $this->groups = $separateByGroup['groups'];
            $this->permissions = $separateByGroup['permissionsGroups'];
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
        // $this->name = slug($value);
    }

    /**
     * Get all separate permission by group name
     *
     * @return array
     */
    public function getAllPermissions()
    {
        return (new PermissionRepo)->separateByGroups();
    }

    /**
     * Update role data to database
     *
     * @return void
     */
    public function update()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'guard_name' => $this->guard_name,
        ];

        try {
            $role = Role::find($this->role_id);
            $role->update($data);

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

            return session()->flash('success', 'Role berhasil diperbarui.');
        } catch (Exception $exception) {
            return session()->flash('error', $exception->getMessage());
        }
    }

    public function render()
    {
        // dd($this->getAllPermissions());
        return view('core::livewire.role.edit');
    }
}
