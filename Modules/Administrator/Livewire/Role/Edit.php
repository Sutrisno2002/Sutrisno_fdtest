<?php

namespace Modules\Administrator\Livewire\Role;

use Exception;
use Livewire\Component;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Modules\Common\Contracts\WithThirdParty;
use Modules\Common\Traits\Utils\FlashMessage;

class Edit extends Component
{
    use WithThirdParty, FlashMessage;

    /**
     * Define role props
     * @var Role $role
     */
    public Role $role;

    /**
     * Define string props
     * @var string
     */
    public ?string $guard = 'web';
    public ?string $name = '';

    /**
     * Define int props
     * @var int
     */
    public ?int $role_id = null;

    /**
     * Define event listeners
     * @var array
     */
    public array $choosen_permissions = [];
    /**
     * Set validation rules
     *
     * @var array
     */
    protected $rules = [
        'name' => 'required|max:191|regex:/^[a-zA-Z ]*$/',
        'guard' => 'required|in:web,customer',
    ];

    /**
     * Set validation messages
     *
     * @var array
     */
    protected $messages = [
        '*.required' => ':attribute tidak boleh kosong',
        '*.min' => 'form :attribute min. :min karakter',
        '*.max' => 'form :attribute maks. :max karakter',
        '*.in' => ':attribute dengan nilai tersebut tidak diperbolehkan',
        'name.regex' => 'format :attribute tidak diperbolehkan. :attribute hanya diperbolehkan huruf.',
    ];

    /**
     * Set validation attributes name
     *
     * @var array
     */
    protected $validationAttributes = [
        'name' => 'Nama depan',
        'guard' => 'Guard',
    ];

    /**
     * Define props value before component rendered
     *
     * @param  Role $role
     * @return void
     */
    public function mount(Role $role)
    {
        $this->role = $role;
        $this->role_id = $role->id;
        $this->guard = $role->guard_name;
        $this->name = $role->name;

        self::setPermissions();
    }

    /**
     * Set permission list
     * @return void
     */
    public function setPermissions()
    {
        $role_permissions = $this->role->permissions->pluck('name')->map(function ($permission) {
            return str_replace('.', '+', $permission);
        })->toArray();

        $permissions  = Permission::where('guard_name', $this->guard)->get();
        $mapped = $permissions->pluck('name')->map(function ($permission) {
            $group = str_replace('-', ' > ', str_replace('_', ' ', $permission));
            $explode = explode('.', $group);
            $value = [
                'group' => isset($explode[1]) ? $explode[1] : null,
                'key' => str_replace('.', '+', $permission),
            ];
            return $value;
        });

        $this->choosen_permissions = $mapped->groupBy('group')->map(function ($rows) use ($role_permissions) {
            $group = [
                'checked' => false,
                'data' => []
            ];

            foreach ($rows as $row) {
                $group['data'][$row['key']] = in_array($row['key'], $role_permissions) ? true : false;
            }

            $group['checked'] = count($group['data']) == count(array_filter($group['data']));

            return $group;
        })->toArray();
    }

    /**
     * Livewire hooks, when search props has been updated
     * This method will be running
     *
     * @param  string $property
     * @param  string $value
     * @return void
     */
    public function updated($property, $value)
    {
        if ($property == 'guard') {
            self::setPermissions();
        }

        // Handle mark all event, when checked property has been updated
        if (str_contains($property, '.checked')) {
            $explode = explode('.', $property);
            $group = $this->choosen_permissions[$explode[1]];
            foreach ($group['data'] as $permission => $val) {
                $this->choosen_permissions[$explode[1]]['data'][$permission] = $value ? true : false;
            }
        }

        // Handle checked value when permission state was change
        if (str_contains($property, '.data.')) {
            $explode = explode('.', $property);
            $group = $this->choosen_permissions[$explode[1]];
            $this->choosen_permissions[$explode[1]]['checked'] = count($group['data']) == count(array_filter($group['data']));
        }
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
            'guard_name' => $this->guard,
            'name' => $this->name,
        ];

        try {
            $permission_groups = array_values($this->choosen_permissions);
            $permissions = [];

            foreach ($permission_groups as $group) {
                foreach ($group['data'] as $key => $items) {
                    $permissions[str_replace('+', '.', $key)] = $items;
                }
            }

            $this->role->update($data);
            $this->role->syncPermissions(
                array_keys(array_filter($permissions))
            );

            return $this->dispatchSuccess('Role berhasil diperbarui.');
        } catch (Exception $exception) {
            return $this->dispatchError($exception->getMessage());
        }
    }

    public function render()
    {
        return view('administrator::livewire.role.edit', [
            'guards' => ['web', 'customer'],
        ]);
    }
}
