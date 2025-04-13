<?php

namespace Modules\Administrator\Livewire\Profile;

use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Common\Contracts\WithThirdParty;
use Modules\Common\Services\ImageService;
use Modules\Common\Traits\Utils\FlashMessage;
use Modules\Core\Models\User;

class Edit extends Component
{
    use WithThirdParty, FlashMessage, WithFileUploads;

    /**
     * Define user props
     * @var User $user
     */
    public User $user;

    /**
     * Define string props
     * @var string
     */
    public ?string $user_id = '';
    public ?string $name = '';
    public ?string $avatar = '';
    public ?string $oldAvatar = '';
    public ?string $email = '';
    public ?string $password = '';
    public ?string $password_confirmation = '';

    /**
     * Define event listeners
     * @var array
     */
    protected $listeners = [
        self::UPDATED_CROPPER,
    ];

    /**
     * Set validation rules
     *
     * @var array
     */
    protected function rules()
    {
        return [
            'name' => 'required|max:191|regex:/^[a-zA-Z ]*$/',
            'email' => 'required|max:191|email|unique:users,email,' . $this->user_id,
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
        '*.unique' => ':attribute telah terdaftar',
        '*.dimensions' => 'file harus dengan format 1:1',
        'password.confirmed' => ':attribute tidak sesuai',
        'name.regex' => 'format :attribute tidak diperbolehkan. :attribute hanya diperbolehkan huruf.',
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
        'password' => 'Kata sandi',
        'password_confirmation' => 'Konfirmasi kata sandi',
    ];

    /**
     * Define props value before component rendered
     *
     * @param  string $user_id
     * @return void
     */
    public function mount(?string $userId)
    {
        try {
            $user = User::find($userId);

            if (!$user) {
                throw new Exception('User tidak ditemukan, pengaturan gagal di-edit.');
            }

            $this->user = $user;
            $this->user_id = $user->id;
            $this->name = $user->name;
            $this->oldAvatar = $user->avatar;
            $this->email = $user->email;

        } catch (Exception $exception) {
            return $this->dispatchError($exception->getMessage());
        }

    }

    /**
     * Livewire hook for updated avatar cropper events
     *
     * @param  string $value
     * @return void
     */
    public function updatedCropper($value)
    {
        $this->avatar = $value;
    }

    /**
     * Update profile data
     *
     * @return void
     */
    public function updateProfile()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'email' => $this->email,
            'updated_by' => user('id'),
        ];

        try {
            if ($this->avatar) {
                $data['avatar'] = (new ImageService)->storeImageFromBase64($this->avatar, 400);
            }

            $this->user->update($data);

            if ($this->avatar) {
                $this->dispatch('updated-avatar', [
                    'url' => $data['avatar'],
                ]);
                $this->user = user();
                $this->oldAvatar = user('avatar');
            }

            return $this->dispatchSuccess('Profil berhasil diperbarui.');
        } catch (Exception $exception) {
            return $this->dispatchError($exception->getMessage());
        }
    }

    /**
     * Update password
     *
     * @return void
     */
    public function updatePassword()
    {
        $this->validate([
            'password' => 'required|confirmed',
            'password_confirmation' => 'nullable',
        ]);

        $data = [
            'updated_by' => user('id'),
        ];

        if ($this->password) {
            $data['password'] = bcrypt($this->password);
        }

        try {
            $this->user->update($data);
            $this->reset('password', 'password_confirmation');

            return $this->dispatchSuccess('Kata sandi berhasil diperbarui.');
        } catch (Exception $exception) {
            return $this->dispatchError($exception->getMessage());
        }
    }

    public function render()
    {
        return view('administrator::livewire.profile.edit');
    }
}
