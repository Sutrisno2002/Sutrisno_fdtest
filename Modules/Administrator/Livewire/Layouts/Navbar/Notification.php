<?php

namespace Modules\Administrator\Livewire\Layouts\Navbar;

use Livewire\Component;
use Modules\Common\Models\AdministratorNotification;

class Notification extends Component
{
    /**
     * Get all notifications
     * @return AdministratorNotification
     */
    public function getAll()
    {
        // return AdministratorNotification::with('category:id,icon')->orderBy('created_at', 'desc')->limit(10)->get();
    }

    /**
     * Set notification as seen
     *
     * @param  int $notification_id
     * @return void
     */
    public function setSeen($notification_id)
    {
        $notification = AdministratorNotification::find($notification_id);
        $notification->seen_at = now();
        $notification->save();

        return redirect()->to($notification->link);
    }

    public function render()
    {
        $notifications = self::getAll();
        return view('administrator::livewire.layouts.navbar.notification', [
            'notifications' => $notifications,
            // 'count' => $notifications->whereNull('seen_at')->count(),
        ]);
    }
}
