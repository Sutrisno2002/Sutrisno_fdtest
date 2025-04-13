<?php

namespace Modules\Administrator\Livewire\Member;

use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Common\Contracts\WithModal;
use Modules\Volunteers\Models\Member;

class Detail extends Component
{
    use WithModal, WithFileUploads;

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
    public $avatar;
    public $status;
    public $verified_at;

    /**
     * Define livewire event listeners
     * @var array
     */
    protected $listeners = [
        'detailMember',
        self::INIT_MODAL,
        self::CLOSE_MODAL,
    ];

    /**
     * Livewire hook for detail member event
     *
     * @param  int|null $id
     * @return void
     */
    public function detailMember(?string $id)
    {

        try {
            // Fetch the member from the database
            $member = Member::find($id);

            if (!$member) {
                throw new Exception('Anggota tidak ditemukan, anggota gagal dimuat.');
            }

            // Populate the member details
            $this->member = $member;
            $this->member_number = $member->member_number;
            $this->member_code = $member->member_code;
            $this->member_serial = $member->member_serial;

            $this->name = $member->name;
            $this->place_of_birth = $member->place_of_birth;
            $this->date_of_birth = $member->date_of_birth;
            $this->phone = $member->phone;
            $this->gender = $member->gender;
            $this->email = $member->email;
            $this->address = $member->fullAddress();
            $this->identity_number = $member->identity_number;
            $this->avatar = $member->avatar;
            $this->status = $member->status;
            $this->verified_at = $member->verified_at;

        } catch (Exception $exception) {
            // On error, set loading to false and dispatch error
            $this->loading = false;
            return $this->dispatchError($exception->getMessage());
        }

        // Set loading to false once data is loaded
        $this->loading = false;
    }

    public function render()
    {
        // Return the view for the component
        return view('administrator::livewire.member.detail');
    }
}
