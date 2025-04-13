<?php

namespace Modules\Core\Http\Livewire\Permission;

use Exception;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Edit extends Component
{
    /**
     * Define query string props
     *
     * @var string
     */
    public $permission_id;
    public $name;
    public $guard_name = 'web';

    /**
     * Set validation rules
     *
     * @var array
     */
    protected $rules = [
        'name' => 'required|max:191|regex:/^[a-zA-Z ._]*$/',
    ];

    /**
     * Set validation messages
     *
     * @var array
     */
    protected $messages = [
        '*.required' => ':attribute tidak boleh kosong',
        '*.max' => 'form :attribute maks. :max karakter',
        'name.regex' => 'format :attribute tidak diperbolehkan. :attribute hanya diperbolehkan huruf, spasi, titik, dan underscore.',
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
    public function mount($permission)
    {
        $permission = (object) $permission;
        $this->permission_id = $permission->id;
        $this->name = $permission->name;
        $this->guard_name = $permission->guard_name;
    }

    /**
     * Update permission data to database
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
            $permission = Permission::find($this->permission_id);
            $permission->update($data);
            return session()->flash('success', 'Permission berhasil diperbarui.');
        } catch (Exception $exception) {
            return session()->flash('error', $exception->getMessage());
        }
    }

    public function render()
    {
        return view('core::livewire.permission.edit');
    }
}
