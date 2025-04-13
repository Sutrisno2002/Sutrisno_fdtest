<?php

namespace Modules\Front\Livewire\Profile;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Modules\Common\Constants\Utilities;
use Modules\Common\Contracts\WithThirdParty;
use Modules\Common\Models\District;
use Modules\Common\Models\Province;
use Modules\Common\Models\Regency;
use Modules\Common\Models\Village;
use Modules\Common\Services\ImageService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Modules\Volunteers\Models\Member;

class Index extends Component
{
    use WithFileUploads, WithThirdParty, WithPagination;

    public $section = 'kta';

    public Member $member;

    // Info
    public $name;
    public $email;
    public $password;
    public $oldPassword;
    public $newPassword;
    public $newPassword_confirmation;
    public $date_of_birth;
    public $place_of_birth;
    public $gender;
    public $identity_number;
    public $phone;
    public $address;
    public $avatar;
    public $oldAvatar;

    // Region
    public ?int $selectedProvince = null;
    public ?int $selectedDistrict = null;
    public ?int $selectedRegency = null;
    public ?int $selectedVillage = null;

    public ?int $province_id = null;
    public ?int $district_id = null;
    public ?int $regency_id = null;
    public ?int $village_id = null;

    public $provinces = [], $regencies = [], $districts = [], $villages = [];
    
    /**
     * Define livewire event listeners
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
        $rules = [
            'name' => 'required|max:191|regex:/^[a-zA-Z ]*$/',
            'avatar' => 'nullable',
            'email' => 'required|max:191|unique:members,email,' . $this->member->id,
            'place_of_birth' => 'required|max:191',
            'date_of_birth' => 'required|date|before:17 years ago',
            'gender' => 'required|in:Pria,Wanita',
            'phone' => 'nullable|max:14|regex:/^[0-9]*$/',
            'identity_number' => 'required|size:16|unique:members,identity_number,' . $this->member->id,
            'address' => 'required|max:191',
            'selectedProvince' => 'required',
            'selectedRegency' => 'required',
            'selectedDistrict' => 'required',
            'selectedVillage' => 'required',
        ];

        if ($this->newPassword || $this->oldPassword || $this->newPassword_confirmation) {
            $rules['oldPassword'] = 'required';
            $rules['newPassword'] = 'required|min:8|confirmed';
            $rules['newPassword_confirmation'] = 'required|min:8';
        }

        return $rules;
    }

    /**
     * Set validation messages
     *
     * @var array
     */
    protected $messages = [
        '*.required' => ':attribute tidak boleh kosong',
        '*.email' => 'Format :email tidak sesuai',
        '*.size' => 'Form :attribute harus :size digit',
        '*.min' => 'Form :attribute min. :min karakter',
        '*.max' => 'Form :attribute maks. :max karakter',
        '*.in' => ':attribute dengan nilai tersebut tidak diperbolehkan',
        'name.regex' => 'Format :attribute tidak diperbolehkan. :attribute hanya diperbolehkan karakter.',
        'email.unique' => ':attribute telah terdaftar',
        'identity_number.unique' => ':attribute telah terdaftar',
        'newPassword.confirmed' => ':attribute tidak cocok',
        '*.before' => ':attribute harus tanggal sebelum 17 tahun yang lalu',
        'identity_number.regex' => 'Format :attribute tidak diperbolehkan. :attribute hanya diperbolehkan angka.',
        'phone.regex' => 'Format :attribute tidak diperbolehkan. :attribute hanya diperbolehkan angka.',
    ];

    /**
     * Set validation attributes name
     *
     * @var array
     */
    protected $validationAttributes = [
        'name' => 'Nama lengkap',
        'gender' => 'Jenis kelamin',
        'avatar' => 'Foto profil',
        'identity_number' => 'No. KTP',
        'email' => 'Email',
        'oldPassword' => 'Kata sandi lama',
        'newPassword' => 'Kata sandi baru',
        'newPassword_confirmation' => 'Ulangi kata sandi baru',
        'phone' => 'No. Telepon',
        'place_of_birth' => 'Tempat lahir',
        'date_of_birth' => 'Tanggal lahir',
        'address' => 'Alamat',
        'province' => 'Provinsi',
        'regency' => 'Kota/Kabupaten',
        'district' => 'Kecamatan',
        'village' => 'Desa/Kelurahan',
    ];

    public function mount($member)
    {
        $this->provinces = Province::all();
        $this->regencies = Regency::where('province_id', $member->province_id)->get();
        $this->districts = District::where('regency_id', $member->regency_id)->get();
        $this->villages = Village::where('district_id', $member->district_id)->get();

        $this->member = $member;

        $this->name = $member->name;
        $this->email = $member->email;
        $this->date_of_birth = $member->date_of_birth;
        $this->place_of_birth = $member->place_of_birth;
        $this->gender = $member->gender;
        $this->phone = unphone($member->phone, 'ID');
        $this->identity_number = $member->identity_number;
        $this->address = $member->address;
        $this->oldAvatar = $member->avatar;

        $this->selectedProvince = $member->province_id;
        $this->selectedRegency = $member->regency_id;
        $this->selectedDistrict = $member->district_id;
        $this->selectedVillage =  $member->village_id;
    }

    public function updatedSelectedProvince()
    {
        $this->regencies = Regency::where('province_id', $this->selectedProvince)->get();
        $this->districts = [];
        $this->villages = [];
        $this->selectedRegency = null;
        $this->selectedDistrict = null;
        $this->selectedVillage = null;
    }

    public function updatedSelectedRegency()
    {
        $this->districts = District::where('regency_id', $this->selectedRegency)->get();
        $this->villages = [];
        $this->selectedDistrict = null;
        $this->selectedVillage = null;
    }

    public function updatedSelectedDistrict()
    {
        $this->villages = Village::where('district_id', $this->selectedDistrict)->get();
        $this->selectedVillage = null;
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

    public function updated($property, $value)
    {
        if ($property !== 'destroyId') {
            $this->resetPage();
        }

        if (!$value || $value == null) {
            $this->reset($property);
        }
    }

    /**
     * Update page data to database
     *
     * @return void
     */
    public function update()
    {
        $this->validate();

        $data = [
            'name' => $this->name,
            'gender' => $this->gender,
            'place_of_birth' => $this->place_of_birth,
            'date_of_birth' => $this->date_of_birth,
            'phone' => phone($this->phone, 'ID'),
            'email' => $this->email,
            'address' => $this->address,
            'province_id' => $this->selectedProvince,
            'regency_id' => $this->selectedRegency,
            'district_id' => $this->selectedDistrict,
            'village_id' => $this->selectedVillage,
            'identity_number' => $this->identity_number,
        ];

        if ($this->avatar) {
            $data['avatar'] = (new ImageService)->storeImageFromBase64Original($this->avatar);
            (new ImageService)->removeImage('images', $this->oldAvatar);
        }

        if ($this->newPassword) {
            if (Hash::check($this->oldPassword, Auth::user()->password) == false) {
                throw ValidationException::withMessages([
                    'oldPassword' => "Kata sandi lama tidak cocok dengan kata sandi saat ini.",
                ]);
            }
            $data['password'] = bcrypt($this->newPassword);
        }

        $member = Member::find($this->member->id);

        $member->update($data);

        $this->resetThirdParty();
        $this->reset(['oldPassword', 'newPassword', 'newPassword_confirmation']);

        return $this->resetPage();
    }

    public function menu()
    {
        return [
            
            [
                'label' => 'KTA',
                'key' => 'kta',
                'icon' => 'bx bx-id-card',
                'description' => 'Preview dan unduh kartu tanda anggota'
            ],
            [
                'label' => 'Profil',
                'key' => 'profil',
                'icon' => 'bx bx-user',
                'description' => 'Avatar, Email, Nama Lengkap, Tanggal Lahir, Tempat Lahir, dll'
            ],
            [
                'label' => 'Kata Sandi',
                'key' => 'password',
                'icon' => 'bx bx-lock',
                'description' => 'Ubah kata sandi'
            ],
        ];
    }

    public function render()
    {
        return view('front::livewire.profile.index', [
            'menus' => self::menu(),
            'genders' => Utilities::getGender(),
            'provinces' => $this->provinces,
            'districts' => $this->districts,
            'regencies' => $this->regencies,
            'villages' => $this->villages,
        ]);
    }
}
