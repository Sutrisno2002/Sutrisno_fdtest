<?php

namespace Modules\Administrator\Livewire\Member;

use Exception;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Common\Contracts\WithModal;
use Modules\Common\Contracts\WithRemoveModal;
use Modules\Common\Models\District;
use Modules\Common\Models\Province;
use Modules\Common\Models\Regency;
use Modules\Common\Models\Village;
use Modules\Common\Services\Repositories\MemberRepo;
use Modules\Common\Traits\Utils\FlashMessage;
use Modules\Volunteers\Models\Member;

class Table extends Component
{
    use WithPagination, WithRemoveModal, FlashMessage;
    use WithModal;

    /**
     * Defines the properties used
     * in this component
     *
     * @var string
     */
    public $filters;
    public $sort = 'created_at';
    public $order = 'desc';
    public $search;
    public $status;
    public $verify;
    public $destroyId = '';
    public $per_page = 12;

    public $member;

    // Filter Props
    public $age;
    public $gender;
    public $selectedProvince;
    public $selectedRegency;
    public $selectedDistrict;
    public $selectedVillage;

    // Array location
    public $provinces=[], $regencies=[], $districts=[], $villages=[];

    /**
     * Define query string used
     * in this component
     *
     * @var array
     */
    protected $queryString = [
        'search',
        'order',
    ];

    /**
     * Define livewire event listeners
     * @var array
     */
    protected $listeners = [
        self::CANCEL,
        self::DESTROY,
        self::FLASH => '$refresh',
        'verifyMember',
        self::INIT_MODAL,
        self::CLOSE_MODAL,
    ];

    /**
     * Define props value before component rendered
     *
     * @return void
     */
    public function mount()
    {
        $this->sort = request('sort') ?: 'created_at';
        $this->order = request('order') ?: 'desc';
        $this->search = request('search');

        $this->provinces = Province::all();
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
     * Livewire hooks, when search props has been updated
     * This method will be running
     *
     * @param  string $value
     * @return void
     */
    public function updatedSearch($value)
    {
        $this->resetPage();
        $this->search = $value;
    }

    /**
     * To handle sort dropdown
     * Update filters property value
     *
     * @param  string $value
     * @return void
     */
    public function sort($column)
    {
        $this->resetPage();
        $this->sort = $column;

        if (!$this->order) {
            $this->order = 'asc';
        } elseif ($this->order == 'asc') {
            $this->order = 'desc';
        } elseif ($this->order == 'desc') {
            $this->sort = null;
            $this->order = null;
        }
    }

    /**
     * To handle order dropdown
     * Update filters property value
     *
     * @param  string $value
     * @return void
     */
    public function order($order)
    {
        $this->resetPage();
        $orders = ['asc', 'desc'];
        if (in_array($order, $orders)) {
            $this->order = $order;
        } else {
            $this->order = null;
        }
    }

    /**
     * To handle perpage pagination
     *
     * @param  mixed $total
     * @return void
     */
    public function updatedPerPage($total)
    {
        $this->resetPage();
        $this->per_page = $total;
    }

    /**
     * To handle reset search property
     * When button with attribute wire:click={resetSearch}
     * This method will be running
     *
     * @return void
     */
    public function resetSearch()
    {
        $this->reset('search');
    }

    /**
     * To handle apply filter property
     * When button with attribute wire:click={searchFilters}
     * This method will be running
     *
     * @return void
     */
    public function searchFilters()
    {
        $this->resetPage();

        // if (!$this->property) {
        //     $this->reset('property');
        // }
    }

    /**
     * To handle reset filter property
     * When button with attribute wire:click={resetFilter}
     * This method will be running
     *
     * @return void
     */
    public function resetFilters()
    {
        // $this->resetPage();

        $this->reset('gender', 'age', 'selectedProvince', 'selectedRegency', 'selectedDistrict', 'selectedVillage');
    }

    /**
     * Updated callback
     * Listen from another component event
     *
     * @return void
     */
    public function updated($property = null, $value = null)
    {
        if ($property !== 'destroyId') {
            $this->resetPage();
        }

        if ($property && !$value) {
            $this->reset($property);
        }
    }

    /**
     * Edit category or sub category
     * Dispatch to create category class
     *
     * @param  int|null $id
     * @return void
     */
    public function detail(?string $id)
    {
        return $this->dispatch('detailMember', $id)->to(Detail::class);
    }

    /**
     * Edit category or sub category
     * Dispatch to create category class
     *
     * @param  int|null $id
     * @return void
     */
    public function edit(?string $id)
    {
        return $this->dispatch('editMember', $id)->to(Edit::class);
    }

    /**
     * Get all Page data from resource
     *
     * @return void
     */
    public function getAll()
    {
        return (new MemberRepo())->filters((object) [
            'search' => $this->search,
            'sort' => $this->sort,
            'order' => $this->order,
            'verify' => $this->verify,
            'gender' => $this->gender,
            'age' => $this->age,
            'province' => $this->selectedProvince,
            'regency' => $this->selectedRegency,
            'district' => $this->selectedDistrict,
            'village' => $this->selectedVillage,
        ], $this->per_page);
    }

    public function filter()
    {
        return (new MemberRepo())->filters((object) [
            'gender' => $this->gender,
            'age' => $this->age,
            'province' => $this->selectedProvince,
            'regency' => $this->selectedRegency,
            'district' => $this->selectedDistrict,
            'village' => $this->selectedVillage,
        ], $this->per_page);
    }

    /**
     * Change post status bocome archive or publish
     *
     * @param  string $id
     * @return void
     */
    public function archive(?string $id)
    {
        try {
            $member = Member::find($id);

            if (!$member) {
                throw new Exception('Anggota tidak ditemukan, Anggota gagal dinonaktifkan.');
            }

            $text = $member->status == 'active' ? 'Anggota berhasil dinonaktifkan.' : 'Anggota berhasil diaktifkan.';
            if ($member->status == 'active') {
                $member->update([
                    'status' => 'inactive',
                ]);
            } else {
                $member->update([
                    'status' => 'active',
                ]);
            }

            return $this->dispatchSuccess($text);
        } catch (Exception $exception) {
            return $this->dispatchError($exception->getMessage());
        }
    }

    public function verification(?string $id)
    {
        $this->dispatch('verifyMember');

        $member = Member::find($id);

        if (!$member) {
            throw new Exception('Anggota tidak ditemukan, anggota gagal dimuat.');
        }

        $this->member = $member;
    }

    public function verificationMember(?string $id)
    {
        try {
            $member = Member::find($id);

            if (!$member) {
                throw new Exception('Anggota tidak ditemukan, anggota gagal dimuat.');
            }

            $lastMemberSerial = Member::query()
                ->whereNotNull('member_serial')
                ->orderBy('member_serial', 'desc')
                ->first();

            $lastMemberSerial = $lastMemberSerial ? $lastMemberSerial->member_serial : null;

            $member_number = Member::generateMemberNumber($lastMemberSerial, $member['regency_id']);

            $member->update([
                'member_number' => $member_number['member_number'],
                'member_code' => $member_number['member_code'],
                'member_serial' => $member_number['member_serial'],
                'verified_at' => now()->toDateTimeString(),
                'verified_by' => user('id'),
            ]);

            return $this->dispatchSuccess('Anggota telah berhasil diverifikasi.', true);
        } catch (Exception $exception) {
            return $this->dispatchError($exception->getMessage(), true);
        }
    }

    /**
     * Destroy page from resource
     *
     * @return void
     */
    public function destroy()
    {
        try {
            $member = Member::find($this->destroyId);

            if (!$member) {
                throw new Exception('Anggota tidak ditemukan, anggota gagal dihapus.');
            }

            $member->forceDelete();

            // $this->dispatch('close-modal');
            $this->reset('destroyId');

            return $this->dispatchSuccess('Anggota berhasil dihapus.', true);
        } catch (Exception $exception) {
            $this->reset('destroyId');
            return $this->dispatchError($exception->getMessage(), true);
        }
    }

    public function render()
    {
        return view('administrator::livewire.member.table', [
            'datas' => $this->getAll(),
            'statuses' => [
                [
                    'value' => '',
                    'label' => 'Semua',
                ],
                [
                    'value' => 'verified',
                    'label' => 'Terverifikasi',
                ],
                [
                    'value' => 'not_verified',
                    'label' => 'Belum Terverifikasi',
                ],
            ],
        ]);
    }
}
