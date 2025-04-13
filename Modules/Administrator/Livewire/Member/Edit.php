<?php

namespace Modules\Administrator\Livewire\Member;

use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Common\Constants\Utilities;
use Modules\Common\Contracts\WithThirdParty;
use Modules\Common\Models\District;
use Modules\Common\Models\Province;
use Modules\Common\Models\Regency;
use Modules\Common\Models\Village;
use Modules\Common\Services\ImageService;
use Modules\Common\Traits\Utils\FlashMessage;
use Modules\Volunteers\Models\Member;

class Edit extends Component
{
    use WithFileUploads, FlashMessage, WithThirdParty;

    /**
     * Define member props
     * @var Member $member
     */
    public Member $member;

    /**
     * Define query string props
     *
     * @var string
     */
    public $member_number;
    public $member_code;
    public $member_serial;

    public $name;
    public $place_of_birth;
    public $date_of_birth;
    public $phone;
    public $gender;
    public $email;
    public $address;

    public $identity_number;
    public $oldAvatar;
    public $avatar;
    public $status;
    public $verified_at;


    // Define int props
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
        return [
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
        'email.unique' => ':attribute telah terdaftar',
        'identity_number.unique' => ':attribute telah terdaftar',
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
        'phone' => 'No. Telepon',
        'place_of_birth' => 'Tempat lahir',
        'date_of_birth' => 'Tanggal lahir',
        'address' => 'Alamat',
        'province' => 'Provinsi',
        'regency' => 'Kota/Kabupaten',
        'district' => 'Kecamatan',
        'village' => 'Desa/Kelurahan',
    ];

    /**
     * Livewire hook for detail member event
     *
     * @param  int|null $id
     * @return void
     */
    public function mount(Member $member)
    {
        $this->provinces = Province::all();
        $this->regencies = Regency::where('province_id', $member->province_id)->get();
        $this->districts = District::where('regency_id', $member->regency_id)->get();
        $this->villages = Village::where('district_id', $member->district_id)->get();

        // Populate the member details
        $this->member = $member;
        $this->member_number = $member->member_number;
        $this->member_code = $member->member_code;
        $this->member_serial = $member->member_serial;

        $this->name = $member->name;
        $this->place_of_birth = $member->place_of_birth;
        $this->date_of_birth = $member->date_of_birth;
        $this->phone = unphone($member->phone, 'ID');
        $this->gender = $member->gender;
        $this->email = $member->email;
        $this->address = $member->address;
        $this->identity_number = $member->identity_number;
        $this->oldAvatar = $member->avatar;
        $this->status = $member->status;
        $this->verified_at = $member->verified_at;

        $this->selectedProvince = $member->province_id;
        $this->selectedRegency = $member->regency_id;
        $this->selectedDistrict = $member->district_id;
        $this->selectedVillage =  $member->village_id;
    }

    public function loadRegenciesByProvince($provinceId)
    {
        $this->regencies = Regency::where('province_id', $provinceId)->get();
        $this->districts = [];
        $this->villages = [];
        $this->selectedRegency = null;
        $this->selectedDistrict = null;
        $this->selectedVillage = null;
    }

    public function loadDistrictsByRegency($regencyId)
    {
        $this->districts = District::where('regency_id', $regencyId)->get();
        $this->villages = [];
        $this->selectedDistrict = null;
        $this->selectedVillage = null;
    }

    public function loadVillagesByDistrict($districtId)
    {
        $this->villages = Village::where('district_id', $districtId)->get();
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

        try {
            $member = Member::find($this->member->id);

            $member->update($data);

            $this->resetThirdParty();
            
            return $this->dispatchSuccess('Informasi anggota berhasil diperbarui.');
        } catch (Exception $exception) {
            return $this->dispatchError($exception->getMessage());
        }
    }

    public function render()
    {
        return view('administrator::livewire.member.edit', [
            'genders' => Utilities::getGender(),
            'provinces' => $this->provinces,
            'districts' => $this->districts,
            'regencies' => $this->regencies,
            'villages' => $this->villages,
        ]);
    }
}
