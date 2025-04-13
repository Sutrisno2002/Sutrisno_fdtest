<?php

namespace Modules\Core\Http\Livewire\Permission;

use Exception;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Create extends Component
{
    /**
     * Define query string props
     *
     * @var string
     */
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
     * Store permission data to database
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
            Permission::create($data);
            $this->reset();

            return session()->flash('success', 'Permission berhasil ditambahkan.');
        } catch (Exception $exception) {
            return session()->flash('error', $exception->getMessage());
        }
    }

    public function render()
    {
        return view('core::livewire.permission.create');
    }
}
