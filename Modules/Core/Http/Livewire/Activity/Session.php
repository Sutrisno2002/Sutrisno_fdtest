<?php

namespace Modules\Core\Http\Livewire\Activity;

use Livewire\Component;
use Modules\Core\Models\Session as ModelsSession;

class Session extends Component
{
    public $per_page = 10;

    public function getAll()
    {
        return ModelsSession::orderByDesc('last_activity')->paginate($this->per_page);
    }

    public function loadMore()
    {
        $this->per_page += 5;
    }

    public function render()
    {
        return view('core::livewire.activity.session', [
            'sessions' => $this->getAll(),
        ]);
    }
}
