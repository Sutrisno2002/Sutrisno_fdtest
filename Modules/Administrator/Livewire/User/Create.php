<?php

namespace Modules\Administrator\Livewire\User;

use Exception;
use Illuminate\Support\Str;
use Livewire\Component;
use Modules\Common\Constants\Utilities;
use Modules\Common\Contracts\WithThirdParty;
use Modules\Common\Traits\Utils\FlashMessage;
use Modules\Core\Models\User;
use Spatie\Permission\Models\Role;

class Create extends Component
{
    use WithThirdParty, FlashMessage;

    /**
     * Define string props
     * @var string
     */
    public ?string $name = '';
    public ?string $avatar = '';
    public ?string $email = '';
    public ?string $role = '';
    public ?string $status = 'active';
    public ?string $password = '';
    public ?string $password_confirmation = '';

    /**
     * Define boolean props
     * @var bool
     */
    public ?bool $is_seen = true;
    public ?bool $verified = true;

    /**
     * Define event listeners
     * @var array
     */
    public $listeners = [
        self::UPDATED_TAGIFY_TAG,
    ];

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
     * Hooks for tags property
     * When tags has been updated,
     * Tags property will be update
     *
     * @param  string $value
     * @return void
     */
    public function updatedTagifyTag($value)
    {
        $this->role = $value;
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
            'id' => User::generateId(),
            'name' => $this->name,
            'avatar' => $this->avatar ?: 'https://ui-avatars.com/api/?name=' . $this->name,
            'email' => $this->email,
            'is_seen' => $this->is_seen,
            'status' => $this->status,
            'email_verified_at' => $this->verified ? now()->toDateTimeString() : null,
            'password' => bcrypt($this->password),
            'created_by' => user('id'),
            'updated_by' => user('id'),
        ];

        try {
            User::create($data);
            
            $find = User::find($data['id']);
            $find->syncRoles(explode(',', $this->role))->save();

            $this->reset();
            $this->resetThirdParty();

            return $this->dispatchSuccess('User berhasil ditambahkan.');
        } catch (Exception $exception) {
            return $this->dispatchError($exception->getMessage());
        }
    }

    public function render()
    {
        return view('administrator::livewire.user.create', [
            'roles' => Role::where('guard_name', 'web')->where('name', '!=', 'Developer')->select(['id', 'name'])->get(),
            'account_statuses' => Utilities::getUserStatus(),
        ]);
    }
}
