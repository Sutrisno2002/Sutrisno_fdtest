<?php

namespace Modules\Common\Contracts;

use Illuminate\Support\Str;

trait UniqueIdGenerator
{
    /**
     * Generate unique id and find where
     * not exsists from sepecific resource
     *
     * @param  string $type [string,number]
     * @param  int $length
     * @param  int $maxLength
     * @return string
     */
    public static function generateId($type = 'string', $length = 8, $maxLength = 32, $column = 'id')
    {
        switch ($type) {
            case 'string':
                $id = substr(Str::random($maxLength), rand(0, $maxLength - $length), $length);
                break;
            case 'number':
                $id = mt_rand(str_pad(1, $length, 0), str_pad(9, $length, 9));
                break;

            default:
                $id = substr(Str::random($maxLength), rand(0, $maxLength - $length), $length);
                break;
        }

        // call the same function if the barcode exists already
        if (self::idExists($id, $column)) {
            return self::generateId($type, $length, $maxLength, $column);
        }

        return $id;
    }

    /**
     * Generate unique invoice code and find where
     * not exsists from sepecific resource
     *
     * @param  array $config = [
     *   'prefix',
     *   'dateFormat',
     *   'suffixLength',
     *   'column'
     * ]
     * @return string
     */
    public static function generateInvoiceCode(array $config)
    {
        $config = [
            'prefix' => isset($config['prefix']) ? $config['prefix'] : 'ORD',
            'dateFormat' => isset($config['dateFormat']) ? $config['dateFormat'] : 'ymd',
            'suffixLength' => isset($config['suffixLength']) ? $config['suffixLength'] : 4,
            'column' => isset($config['column']) ? $config['column'] : 'order_code',
        ];

        $date = now()->format($config['dateFormat']);
        $search = $config['prefix'] . $date;
        $lastInvoice = self::latestInModel($search, $config['column']);

        if (!$lastInvoice) {
            return $config['prefix'] . $date . str_pad(1, $config['suffixLength'], '0', STR_PAD_LEFT);
        }

        $suffix = substr($lastInvoice->order_code, -$config['suffixLength']);
        $lastIncrement = str_pad($suffix + 1, $config['suffixLength'], '0', STR_PAD_LEFT);
        $invoiceCode =  $config['prefix'] . $date . $lastIncrement;

        $findInvoice = self::idExists($invoiceCode, $config['column']);

        if ($findInvoice) {
            return self::generateInvoiceCode($config);
        }

        return $invoiceCode;
    }

    /**
     * Check if id is exists or not in the resource
     *
     * @param  string $id
     * @param  string $column
     * @return boolean
     */
    public static function idExists(string $id, string $column = 'id')
    {
        return self::where($column, $id)->exists();
    }

    /**
     * Get latest data with specific requirement
     *
     * @param  string $search
     * @param  string $column
     * @return Model
     */
    public static function latestInModel(string $search, string $column = 'id')
    {
        return self::withoutGlobalScopes()->where($column, 'LIKE', '%' . $search . '%')->latest()->first();
    }
}
