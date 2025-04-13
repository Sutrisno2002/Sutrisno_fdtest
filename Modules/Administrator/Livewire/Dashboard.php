<?php

namespace Modules\Administrator\Livewire;

use Livewire\Component;
use Modules\Common\Contracts\WithThirdParty;
use Modules\Common\Services\Repositories\MemberRepo;
use Modules\Common\Traits\Utils\FlashMessage;

class Dashboard extends Component
{
    use WithThirdParty, FlashMessage;

    public function render()
    {
        return view('administrator::livewire.dashboard',[
            'gender' => (new MemberRepo)->getGenderData(),
            'age' => (new MemberRepo)->getAgeData(),
            'province' => (new MemberRepo)->getProvinceData(),
        ]);
    }
}
