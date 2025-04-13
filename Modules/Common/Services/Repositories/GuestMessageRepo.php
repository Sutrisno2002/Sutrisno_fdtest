<?php

namespace Modules\Common\Services\Repositories;

use Modules\Common\Models\GuestMessage;
use Modules\Common\Models\Testimonial;

class GuestMessageRepo
{
    /**
     * Get all guestmessage data from resource
     * with specific request
     *
     * @param  object $request
     * @param  int $total
     * @return Illuminate\Contracts\Pagination\Paginator
     */
    public function filters(object $request, $total = 10)
    {
        $guestmessage = GuestMessage::query();

        if (isset($request->search)) {
            if ($request->search) {
                $guestmessage->search($request);
            }
        }

        return $guestmessage->sort($request)->paginate($total);
    }
}
