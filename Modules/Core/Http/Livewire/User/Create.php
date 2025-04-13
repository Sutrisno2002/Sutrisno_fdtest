<?php

namespace Modules\Core\Http\Livewire\User;

use Exception;
use Illuminate\Support\Str;
use Livewire\Component;
use Modules\Common\Constants\Utilities;
use Modules\Core\Models\User;
use Spatie\Permission\Models\Role;

class Create extends Component
{
    /**
     * Define query string props
     *
     * @var string
     */
    public $name;
    public $avatar;
    public $email;
    public $is_seen = true;
    public $role;
    public $status = 'active';
    public $verified = true;
    public $password;
    public $password_confirmation;

    /**
     * Set validation rules
     *
     * @var array
     */
    protected $rules = [
        'name' => 'required|max:191|regex:/^[a-zA-Z ]*$/',
        'avatar' => 'nullable',
        'email' => 'required|max:191|email|unique:users,email',
        'is_seen' => 'nullable',
        'status' => 'required|max:191|in:active,inactive,disable',
        'role' => 'required|max:191',
        'verified' => 'nullable',
        'password' => 'required|confirmed',
        'password_confirmation' => 'nullable',
    ];

    /**
     * Set validation messages
     *
     * @var array
     */
    protected $messages = [
        '*.required' => ':attribute tidak boleh kosong',
        '*.email' => 'format :email tidak sesuai',
        '*.min' => 'form :attribute min. :min karakter',
        '*.max' => 'form :attribute maks. :max karakter',
        '*.in' => ':attribute dengan nilai tersebut tidak diperbolehkan',
        '*.unique' => ':attribute telah terdaftar',
        'password.confirmed' => ':attribute tidak sesuai',
        'name.regex' => 'format :attribute tidak diperbolehkan. :attribute hanya diperbolehkan huruf.',
        'price.regex' => 'format :attribute tidak diperbolehkan. :attribute hanya diperbolehkan angka.',
    ];

    /**
     * Set validation attributes name
     *
     * @var array
     */
    protected $validationAttributes = [
        'name' => 'Nama depan',
        'avatar' => 'Avatar',
        'email' => 'Email',
        'is_seen' => 'Dilihat?',
        'role' => 'Peran',
        'status' => 'Status akun',
        'verified' => 'Verifikasi email',
        'password' => 'Kata sandi',
        'password_confirmation' => 'Konfirmasi kata sandi',
    ];

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
     * Store user data to database
     *
     * @return void
     */
    public function store()
    {
        $this->validate();

        $data = [
            'id' => Str::uuid(), 
            'name' => $this->name,
            'avatar' => $this->avatar,
            'email' => $this->email,
            'is_seen' => $this->is_seen,
            'status' => $this->status,
            'email_verified_at' => $this->verified ? now()->toDateTimeString() : null,
            'password' => bcrypt($this->password),
            'created_by' => user('id'),
            'updated_by' => user('id'),
        ];

        try {
            $user = User::create($data);
            $user->assignRole($this->role);
            $this->reset();

            return session()->flash('success', 'User berhasil ditambahkan.');
        } catch (Exception $exception) {
            return session()->flash('error', $exception->getMessage());
        }
    }

    public function render()
    {
        return view('core::livewire.user.create', [
            'roles' => Role::where('guard_name', 'web')->select(['id', 'name'])->get(),
            'account_statuses' => Utilities::getUserStatus(),
        ]);
    }
}
