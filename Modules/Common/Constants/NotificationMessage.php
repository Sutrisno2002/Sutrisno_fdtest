<?php

namespace Modules\Common\Constants;

use \Exception;

class NotificationMessage
{
    /**
     * Define constants of notification messages
     * @var string
     */
    const ORDER_PENDING = 'Pesanan baru telah dibuat dengan kode invoice: ${INVOICE} Segera lakukan pembayaran! Pembayaran akan kadaluarsa kurang dari 24 Jam.';
    const ORDER_SUCCESS = 'Pesanan dengan kode invoice: ${INVOICE} telah berhasil dibayar.';
    const ORDER_FAILED = 'Pesanan dengan diproses karena ada masalah pada sistem kami. Silahkan coba beberapa saat lagi.';
    const ORDER_EXPIRED = 'Pesanan dengan kode invoice: ${INVOICE} telah kadaluarsa.';
    const COURSE_KLAIM = 'Kelas dengan nama: ${COURSE_NAME} telah berhasil diklaim.';
    const COURSE_HADIAH = 'Kelas dengan nama: ${COURSE_NAME} telah diberikan oleh ${USER}.';

    /**
     * Return notification message from Order
     *
     * @param  string $status [PENDING,SUCCESS,FAILED,EXPIRED]
     * @param  string $invoice_code
     * @return string|null
     */
    public static function order(?string $status, ?string $invoice_code)
    {
        try {
            $const = constant('self::ORDER_' . strtoupper($status));
            return str_replace('${INVOICE}', $invoice_code, $const);
        } catch (Exception $exception) {
            info($exception);
            return null;
        }
    }

    /**
     * Return notification message from Course
     *
     * @param  string $status [KLAIM,HADIAH]
     * @param  string $course_name
     * @param  string $user_name
     * @return string|null
     */
    public static function course(?string $status, ?string $course_name, ?string $user_name = null)
    {
        try {
            $const = constant('self::COURSE_' . strtoupper($status));

            if (!$user_name) {
                return str_replace('${COURSE_NAME}', $course_name, $const);
            }

            return str_replace('${USER}', $user_name, str_replace('${COURSE_NAME}', $course_name, $const));
        } catch (Exception $exception) {
            info($exception);
            return null;
        }
    }
}
