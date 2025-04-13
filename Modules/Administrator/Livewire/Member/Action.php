<?php

namespace Modules\Administrator\Livewire\Member;

use Exception;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Common\Models\District;
use Modules\Common\Models\Province;
use Modules\Common\Models\Regency;
use Modules\Common\Models\Village;
use Modules\Common\Traits\Utils\FlashMessage;
use Modules\Volunteers\Models\Member;

class Action extends Component
{
    use WithFileUploads, FlashMessage;

    public $csv;

    protected $rules = [
        'csv' => 'required|mimes:csv,txt', // Validasi file
    ];

    public function updatedCsv()
    {
        $this->validate();

        $dir = 'temp';
        $filename = 'import_' . now()->format('YmdHis') . '.csv';
        $path = $this->csv->storeAs($dir, $filename);

        try {

            // Dapatkan path lengkap file
            $file = Storage::path($path);

            // Parsing CSV
            $csvData = array_map('str_getcsv', file($file));
            $headers = $csvData[0]; // Ambil header dari CSV
            unset($csvData[0]); // Hilangkan header dari data


            foreach ($csvData as $row) {
                $data = array_combine($headers, $row);

                $province = Province::where('name', $data['Provinsi'])->first();
                $regency = Regency::where('name', $data['Kabupaten/Kota'])->first();
                $district = District::where('name', $data['Kecamatan'])->first();
                $village = Village::where('name', $data['Kelurahan'])->first();

                Member::updateOrCreate([
                    'id' => Member::generateId(),
                    'name' => $data['Nama'],
                    'email' => $data['Email'],
                    'gender' => $data['Jenis Kelamin'],
                    'place_of_birth' => $data['Tempat Lahir'],
                    'date_of_birth' => $data['Tanggal Lahir'],
                    'phone' => $data['No. Telepon'],
                    'address' => $data['Alamat'],
                    'province_id' => $province->id,
                    'regency_id' =>  $regency->id,
                    'district_id' => $district->id,
                    'village_id' =>  $village->id,
                    'identity_number' => $data['NIK'],
                    'avatar' => '/assets/default/images/avatar_thumbnail.png',
                ]);
            }

            // Hapus file csv
            $delete = '/temp' . '/' . $filename;
            Storage::delete($delete);

            $this->reset('csv');
            $this->dispatchSuccess('File berhasil diimpor.');
            return redirect()->route('administrator.member.index');
        } catch (Exception $exception) {
            return $this->dispatchError($exception->getMessage());
        }
    }

    public function render()
    {
        return view('administrator::livewire.member.action');
    }
}
