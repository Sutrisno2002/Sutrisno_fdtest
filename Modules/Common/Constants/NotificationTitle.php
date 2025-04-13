<?php

namespace Modules\Common\Constants;

use \Exception;

class NotificationTitle
{
    /**
     * Define constants of notification title
     * @var string
     */
    const ORDER_PENDING = 'Pesanan telah dibuat!';
    const ORDER_SUCCESS = 'Pesanan telah terbayar!';
    const ORDER_FAILED = 'Pesanan gagal diproses!';
    const ORDER_EXPIRED = 'Pesanan telah kadaluarsa!';
    const COURSE_KLAIM = 'Kelas berhasil diklaim!';
    const COURSE_HADIAH = 'Kelas berhasil diberikan!';

    /**
     * Return notification title from Order
     *
     * @param  string $status [PENDING,SUCCESS,FAILED,EXPIRED]
     * @return string|null
     */
    public static function order(?string $status)
    {
        try {
            return constant('self::ORDER_' . strtoupper($status));
        } catch (Exception $exception) {
            return null;
        }
    }

    /**
     * Return notification title from Course
     *
     * @param  string $status [KLAIM,HADIAH]
     * @return string|null
     */
    public static function course(?string $status)
    {
        try {
            return constant('self::COURSE_' . strtoupper($status));
        } catch (Exception $exception) {
            return null;
        }
    }
}
