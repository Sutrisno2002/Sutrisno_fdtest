<?php

namespace Modules\Front\Livewire\Member;

use App\Mail\RegisterMail;
use Exception;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Modules\Common\Constants\Utilities;
use Modules\Common\Models\District;
use Modules\Common\Models\Province;
use Modules\Common\Models\Regency;
use Modules\Common\Models\Village;
use Modules\Common\Services\ImageService;
use Modules\Volunteers\Models\Member;

class Register extends Component
{
    /**
     * Define query string props
     *
     * @var string
     */
    public $name;
    public $gender;
    public $place_of_birth;
    public $date_of_birth;
    public $phone;
    public $email;
    public $address;
    public $avatar = null;
    public $oldAvatar;
    public $identity_number;
    public $status = 'inactive';
    public $is_agree = false;
    public $dataCaptcha;

    public $province;
    public $regency;
    public $district;
    public $village;

    /**
     * Set validation rules
     *
     * @var array
     */
    protected $rules = [
        'name' => 'required|max:191|regex:/^[a-zA-Z ]*$/',
        'avatar' => 'required',
        'email' => 'required|max:191|email',
        'place_of_birth' => 'required',
        'date_of_birth' => 'required|date|before:17 years ago',
        'gender' => 'required|in:Pria,Wanita',
        'phone' => 'nullable|max:14|regex:/^[0-9]*$/',
        'identity_number' => 'required|size:16|unique:members,identity_number|regex:/^[0-9]*$/',
        'address' => 'required|max:191',
        'province' => 'required',
        'regency' => 'required',
        'district' => 'required',
        'village' => 'required',
    ];

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
        'phone_number.regex' => 'Format :attribute tidak diperbolehkan. :attribute hanya diperbolehkan angka.',
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
     * Livewire hooks, when search props has been updated
     * This method will be running
     *
     * @param  string $value
     * @return void
     */
    public function updated($component, $value)
    {
        if ($component == 'province') {
            $this->reset('regency', 'district', 'village');
        }
        if ($component == 'regency') {
            $this->reset('district', 'village');
        }
        if ($component == 'district') {
            $this->reset('village');
        }

        if ($component == 'is_agree') {
            $this->is_agree = $value;
        }

        if ($component == 'avatar') {
            $this->avatar = $value;
        }
    }

    public function destroyImage()
    {
        $this->reset('avatar');
    }

    /**
     * Store member data to database
     *
     * @return void
     */
    public function store()
    {

        $this->validate();

        $checkIdentityMember = Member::query()->where('identity_number', $this->identity_number)->first();
        if ($checkIdentityMember) {
            return session()->flash('error', 'Nomor identitas Anda sudah terdaftar sebagai Relawan GPJ. Silakan periksa data Anda atau hubungi kami untuk informasi lebih lanjut.');
        }

        if ($this->is_agree != true) {
            return session()->flash('error', 'Anda harus menyetujui Kebijakan Privasi Relawan GPJ untuk melanjutkan pendaftaran.');
        }

        $data = [
            'id' => Member::generateId(),
            'name' => $this->name,
            'gender' => $this->gender,
            'place_of_birth' => $this->place_of_birth,
            'date_of_birth' => $this->date_of_birth,
            'phone' => phone($this->phone, 'ID'),
            'email' => $this->email,
            'address' => $this->address,
            'province_id' => $this->province,
            'regency_id' => $this->regency,
            'district_id' => $this->district,
            'village_id' => $this->village,
            'identity_number' => $this->identity_number,
        ];

        if ($this->avatar) {
            $data['avatar'] = (new ImageService)->storeImageFromBase64Original($this->avatar);
        }

        try {
            $member = Member::create($data);

            Mail::to($member->email)->send(new RegisterMail($member));

            $this->reset();
            return session()->flash('success', 'Pendaftaran berhasil! Kami sedang memverifikasi data Anda, yang membutuhkan waktu 14-30 hari kerja. Silakan periksa email Anda untuk informasi lebih lanjut.');
        } catch (Exception $exception) {
            return session()->flash('failed', 'Terjadi kesalahan: ' . $exception->getMessage());
        }
    }

    public function render()
    {
        return view('front::livewire.member.register', [
            'genders' => Utilities::getGender(),
            'provinces' => Province::all(),
            'regencies' => Regency::where('province_id', $this->province)->get(),
            'districts' => District::where('regency_id', $this->regency)->get(),
            'villages' => Village::where('district_id', $this->district)->get(),
        ]);
    }
}
