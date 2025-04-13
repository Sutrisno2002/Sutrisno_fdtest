<?php

namespace Modules\Administrator\Livewire\Layouts;

use Livewire\Component;

class Navbar extends Component
{
    public function render()
    {
        return view('administrator::livewire.layouts.navbar', [
            'user' => user(),
        ]);
    }
}
