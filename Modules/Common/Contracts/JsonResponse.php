<?php

namespace Modules\Common\Contracts;

use Exception;
use Illuminate\Http\Response;

trait JsonResponse
{
    /**
     * Json formatter for success response
     *
     * @param  string $message
     * @param  mixed $data
     * @param  bool $pagination
     * @return Response
     */
    public function success(
        string $message = null,
        mixed $data,
        bool $pagination = false
    ) {
        $res = [
            'message' => $message ?: 'Success getting data.',
        ];

        if (!$pagination) {
            $res['data'] = $data;
        } else {
            $res = array_merge($res, $data);
        }

        return response()->json($res)->setStatusCode(200);
    }

    /**
     * Json formatter for error response
     *
     * @param  string $message
     * @param  Exception $exception
     * @param  int $status_code
     * @return Response
     */
    public function error(
        string $message = null,
        $exception,
        int $status_code = 500
    ) {
        // Handle exeption status code
        if ($exception instanceof Exception) {
            if (method_exists($exception, 'getStatusCode')) {
                $status_code = $exception?->getStatusCode();
            } elseif (method_exists($exception, 'getCode')) {
                $status_code = ($exception->getCode() >= 400 && $exception->getCode() <= 600) ? $exception->getCode() : 500;
            }
        }

        // Handle json response
        if (json_decode($exception->getMessage())) {
            $error = json_decode($exception->getMessage());
        } else {
            $error = $exception->getMessage();
        }

        return response()->json([
            'message' => $message ?: 'There is something wrong.',
            'error' => $error ?: null,
        ])->setStatusCode($status_code);
    }
}
