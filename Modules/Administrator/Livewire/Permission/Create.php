<?php

namespace Modules\Administrator\Livewire\Permission;

use Exception;
use Livewire\Component;
use Modules\Common\Traits\Utils\FlashMessage;
use Spatie\Permission\Models\Permission;

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
     * @return void
     */
    public function mount()
    {
        //
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
     * Store permission data to database
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
            Permission::create($data);
            $this->reset();

            return $this->dispatchSuccess('Permission berhasil ditambahkan.');
        } catch (Exception $exception) {
            return $this->dispatchError($exception->getMessage());
        }
    }

    public function render()
    {

        return view('administrator::livewire.permission.create', [
            'guards' => ['web', 'customer'],
        ]);
    }
}
