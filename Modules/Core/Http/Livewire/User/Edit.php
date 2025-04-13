<?php

namespace Modules\Core\Http\Livewire\User;

use Exception;
use Livewire\Component;
use Modules\Common\Constants\Utilities;
use Modules\Core\Models\User;
use Spatie\Permission\Models\Role;

class Edit extends Component
{
    /**
     * Define query string props
     *
     * @var string
     */
    public $user_id;
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
    protected function rules()
    {
        return [
            'name' => 'required|max:191|regex:/^[a-zA-Z ]*$/',
            'avatar' => 'nullable',
            'email' => 'required|max:191|email|unique:users,email,' . $this->user_id,
            'is_seen' => 'nullable',
            'status' => 'required|max:191|in:active,inactive,disable',
            'role' => 'required|max:191',
            'verified' => 'nullable',
            'password' => 'nullable|confirmed',
            'password_confirmation' => 'nullable',
        ];
    }

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
     * Define props value before component rendered
     *
     * @return void
     */
    public function mount($user)
    {
        $user = User::find($user['id']);
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->avatar = $user->avatar;
        $this->email = $user->email;
        $this->is_seen = $user->is_seen;
        $this->verified = $user->email_verified_at;

        $role = $user->roles->first();
        if ($role) {
            $this->role = $role->name;
        }

        $status = array_map(function ($status) {
            return $status['value'];
        }, Utilities::USER_STATUS);

        if (in_array($user->status, $status)) {
            $this->status = $user->status;
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
     * Update user data to database
     *
     * @return void
     */
    public function update()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'avatar' => $this->avatar,
            'email' => $this->email,
            'is_seen' => $this->is_seen,
            'status' => $this->status,
            'email_verified_at' => $this->verified ? now()->toDateTimeString() : null,
            'updated_by' => user('id'),
        ];

        if ($this->password) {
            $data['password'] = bcrypt($this->password);
        }

        try {
            $user = User::find($this->user_id);
            $user->syncRoles($this->role);
            $user->update($data);

            return session()->flash('success', 'User berhasil diperbarui.');
        } catch (Exception $exception) {
            return session()->flash('error', $exception->getMessage());
        }
    }

    public function render()
    {
        return view('core::livewire.user.edit', [
            'roles' => Role::where('guard_name', 'web')->select(['id', 'name'])->get(),
            'account_statuses' => Utilities::getUserStatus(),
        ]);
    }
}
