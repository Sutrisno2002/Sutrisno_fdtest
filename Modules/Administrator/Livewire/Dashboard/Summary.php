<?php

namespace Modules\Administrator\Livewire\Dashboard;

use Livewire\Component;
use Modules\Common\Contracts\WithThirdParty;
use Modules\Common\Models\GuestMessage;
use Modules\Common\Services\Repositories\MemberRepo;
use Modules\Common\Traits\Utils\FlashMessage;
use Modules\Customer\Models\Customer;
use Modules\ECommerce\Models\Order;
use Modules\Volunteers\Models\Member;

class Summary extends Component
{
    use WithThirdParty, FlashMessage;

    public function render()
    {
        return view('administrator::livewire.dashboard.summary', [
            'members' => Member::all()->count(),
            'verified' => Member::whereNotNull('verified_at')->count(),
            'notverified' => Member::whereNull('verified_at')->count(),
            'kta_done' => Member::whereNotNull('kta_send_email')->count(),
            'kta_pending' => Member::whereNull('kta_send_email')->count(),
        ]);
    }
}
