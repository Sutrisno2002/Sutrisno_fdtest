<?php

namespace Modules\Core\Observers;

use Exception;
use Modules\Common\Services\ImageService;
use Modules\Core\Models\User;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \Modules\Core\Models\User  $user
     * @return void
     */
    public function created(User $user)
    {
        $log = createLog('users');

        $log->info('User has been created. With email: {' . $user->email . '}');

        if (!$user->email_verified_at) {
            try {
                $user->sendEmailVerificationNotification();
                $log->info('Success send email verification to {' . $user->email . '}');
            } catch (Exception $exception) {
                $log->error('Error sending email verification to {' . $user->email . '}. \n With error: ' . $exception->getMessage());
                session()->flash('failed', 'Error sending email verification to {' . $user->email . '}. \n With error: ' . $exception->getMessage());
            }
        }
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \Modules\Core\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {
        $log = createLog('users');

        $log->info('Avatar: {' . $user->email . '}');

        if ($user->getOriginal('avatar') !== $user->avatar) {
            (new ImageService)->removeImage('images', $user->getOriginal('avatar'));
        }
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \Modules\Core\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        $log = createLog('users');
        $log->info('User with email: {' . $user->email . '} deleted successfully.');
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \Modules\Core\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \Modules\Core\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
