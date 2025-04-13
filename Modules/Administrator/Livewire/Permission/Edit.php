<?php

namespace Modules\Administrator\Livewire\Permission;

use Exception;
use Illuminate\Support\Str;
use Livewire\Component;
use Modules\Common\Contracts\WithThirdParty;
use Modules\Common\Traits\Utils\FlashMessage;
use Spatie\Permission\Models\Permission;

class Edit extends Component
{
    use WithThirdParty, FlashMessage;

    /**
     * Define permission props
     * @var Permission $permission
     */
    public Permission $permission;

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
    public ?int $permission_id = null;

    /**
     * Set validation rules
     *
     * @var array
     */
    protected $rules = [
        'name' => 'required|max:191',
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
        'name' => 'Nama permission',
        'guard' => 'Guard',
    ];

    /**
     * Define props value before component rendered
     *
     * @param  Permission $permission
     * @return void
     */
    public function mount(Permission $permission)
    {
        $this->permission = $permission;
        $this->permission_id = $permission->id;
        $this->guard = $permission->guard_name;
        $this->name = $permission->name;
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
        //
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
            'guard_name' => $this->guard,
            'name' => $this->name,
        ];

        try {
            $this->permission->update($data);

            return $this->dispatchSuccess('Permission berhasil diperbarui.');
        } catch (Exception $exception) {
            return $this->dispatchError($exception->getMessage());
        }
    }

    public function render()
    {
        return view('administrator::livewire.permission.edit', [
            'guards' => ['web', 'customer'],
        ]);
    }
}
