<?php

namespace Modules\Administrator\Livewire\Role;

use Exception;
use Livewire\Component;
use Modules\Common\Traits\Utils\FlashMessage;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Create extends Component
{
    use FlashMessage;

    /**
     * Define string props
     * @var string
     */
    public ?string $name = '';
    public ?string $guard = 'web';

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
     * @return void
     */
    public function mount()
    {
        self::setPermissions();
    }

    /**
     * Set permission list
     * @return void
     */
    public function setPermissions()
    {
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

        $this->choosen_permissions = $mapped->groupBy('group')->map(function ($rows) {
            $group = [
                'checked' => false,
                'data' => []
            ];

            foreach ($rows as $row) {
                $group['data'][$row['key']] = false;
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
     * Store role data to database
     *
     * @return void
     */
    public function store()
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

            $role = Role::create($data);
            $role->syncPermissions(
                array_keys(array_filter($permissions))
            );

            $this->reset();

            return $this->dispatchSuccess('Role berhasil ditambahkan.');
        } catch (Exception $exception) {
            return $this->dispatchError($exception->getMessage());
        }
    }

    public function render()
    {

        return view('administrator::livewire.role.create', [
            'guards' => ['web', 'customer'],
        ]);
    }
}
