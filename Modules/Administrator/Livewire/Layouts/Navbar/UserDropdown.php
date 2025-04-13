<?php

namespace Modules\Administrator\Livewire\Layouts\Navbar;

use Livewire\Component;
use Modules\Core\Models\User;

class UserDropdown extends Component
{

    /**
     * Initialize the user property with the provided user instance
     *
     * @param User $user
     */
    public User $user;

    /**
     * Initialize the user property with the provided user instance
     *
     * @param User $user
     */
    public function mount($user)
    {
        $this->user = $user;
    }

    /**
     * Retrieve the menu items for the user dropdown
     *
     * @return array
     */
    public function menus()
    {
        return [
            [
                'label' => 'Profil',
                'link' => route('administrator.profile'),
                'icon' => 'bx bx-user',
                'role' => null,
            ],
            [
                'label' => 'Monitoring',
                'link' => route('pulse', ['period' => '24_hours']),
                'icon' => 'bx bx-desktop',
                'role' => 'Developer|Super Admin',
            ],
            // [
            //     'label' => 'Log',
            //     'link' => url('administrator/log'),
            //     'icon' => 'bx bx-archive',
            //     'role' => 'Developer|Super Admin',
            // ],
        ];
    }

    public function render()
    {
        return view('administrator::livewire.layouts.navbar.user-dropdown', [
            'menus' => self::menus(),
        ]);
    }
}
