<?php

namespace Modules\Common\Constants;

use Illuminate\Support\Collection;

class Utilities
{
    /**
     * Define constant transaction type
     *
     * @return array
     */
    const TRANSACTION_TYPE = [
        [
            'value' => 'PURCHASE',
            'label' => 'Pembelian',
        ],
        [
            'value' => 'DISBURSEMENT',
            'label' => 'Pengembalian',
        ],
        [
            'value' => 'ADDING_POINT',
            'label' => 'Penambahan Poin',
        ],
        [
            'value' => 'REEDEM_POINT',
            'label' => 'Penukaran Poin',
        ],
    ];

    /**
     * Define constant course type
     *
     * @return array
     */
    const COURSE_TYPE = [
        [
            'value' => 'free',
            'label' => 'Gratis',
        ],
        [
            'value' => 'paid',
            'label' => 'Berbayar',
        ],
    ];

    /**
     * Define constant media source
     *
     * @return array
     */
    const MEDIA_SOURCE = [
        [
            'value' => 'url',
            'label' => 'Link Video',
        ],
        [
            'value' => 'embed',
            'label' => 'Embed Video',
        ],
    ];

    /**
     * Define constant discount type
     *
     * @return array
     */
    const DISCOUNT_TYPE = [
        [
            'value' => 'fixed',
            'label' => 'Tetap',
        ],
        [
            'value' => 'percentage',
            'label' => 'Persentase',
        ],
    ];

    /**
     * Define constant navigation placements
     *
     * @return array
     */
    const NAVIGATION_PLACEMENT = [
        [
            'value' => 'navbar',
            'label' => 'Navbar',
        ],
        [
            'value' => 'footer',
            'label' => 'Footer',
        ],
    ];

    /**
     * Define constant post types
     *
     * @return array
     */
    const POST_TYPE = [
        [
            'value' => 'article',
            'label' => 'Artikel',
        ],
        [
            'value' => 'blog',
            'label' => 'Blog',
        ],
    ];

    /**
     * Define constant user account status
     *
     * @return array
     */
    const USER_STATUS = [
        [
            'value' => 'active',
            'label' => 'Aktif',
        ],
        [
            'value' => 'inactive',
            'label' => 'Tidak Aktif',
        ],
        [
            'value' => 'disable',
            'label' => 'Blokir',
        ],
    ];

    /**
     * Define constant product type
     *
     * @return array
     */
    const PRODUCT_TYPE = [
        [
            'value' => 'simple',
            'label' => 'Tanpa Variasi',
        ],
        [
            'value' => 'variable',
            'label' => 'Variasi',
        ],
        [
            'value' => 'digital',
            'label' => 'Digital',
        ],
    ];

    /**
     * Define constant boolean
     *
     * @return array
     */
    const BOOLEAN = [
        [
            'value' => 1,
            'label' => 'Aktif',
        ],
        [
            'value' => 0,
            'label' => 'Tidak Aktif',
        ],
    ];

    /**
     * Define constant active state
     *
     * @return array
     */
    const ACTIVE_STATE = [
        [
            'value' => 'active',
            'label' => 'Aktif',
        ],
        [
            'value' => 'inactive',
            'label' => 'Tidak Aktif',
        ],
    ];

    /**
     * Define constant order status
     *
     * @return array
     */
    const ORDER_STATUS = [
        [
            'value' => 'Pending',
            'label' => 'Tertunda',
        ],
        [
            'value' => 'Inprocess',
            'label' => 'Dalam Proses',
        ],
        [
            'value' => 'Dispatched',
            'label' => 'Dikirim',
        ],
        [
            'value' => 'Complete',
            'label' => 'Selesai',
        ],
        [
            'value' => 'Return',
            'label' => 'Pengembalian',
        ],
        [
            'value' => 'Cancel',
            'label' => 'Dibatalkan',
        ],
        [
            'value' => 'Shipped',
            'label' => 'Pengiriman',
        ],
    ];

    /**
     * Define constant stock status
     *
     * @return array
     */
    const STOCK_STATUS = [
        [
            'value' => 'IN',
            'label' => 'Masuk',
        ],
        [
            'value' => 'OUT',
            'label' => 'Keluar',
        ],
    ];

    /**
     * Define constant poin type
     *
     * @return array
     */
    const POINT_TYPE = [
        [
            'value' => 'register_points',
            'label' => 'Poin Pendaftaran',
        ],
        [
            'value' => 'per_order_point',
            'label' => 'Poin Belanja',
        ],
        [
            'value' => 'redeem',
            'label' => 'Penukaran Poin',
        ],
    ];

    /**
     * Define constant setting group
     *
     * @return array
     */
    const SETTING_GROUP = [
        [
            'value' => 'website_general',
            'label' => 'Website',
        ],
        [
            'value' => 'contact',
            'label' => 'Kontak',
        ],
        [
            'value' => 'seo',
            'label' => 'Search Engine Optimization',
        ],
        [
            'value' => 'point_setting',
            'label' => 'Pengaturan Poin',
        ],
        [
            'value' => 'pos',
            'label' => 'Point of Sales',
        ],
    ];

    /**
     * Define constant order from
     *
     * @return array
     */
    const ORDER_FROM = [
        [
            'value' => 'web',
            'label' => 'Website',
        ],
        [
            'value' => 'pos',
            'label' => 'Point of Sales',
        ],
    ];

    /**
     * Define constant payment method
     *
     * @return array
     */
    const PAYMENT_METHOD = [
        [
            'value' => 'cod',
            'label' => 'COD',
        ],
        [
            'value' => 'xendit',
            'label' => 'Xendit',
        ],
        [
            'value' => 'manual_transfer',
            'label' => 'Transfer Manual',
        ],
        [
            'value' => 'cash',
            'label' => 'Cash',
        ],
    ];

    /**
     * Define constant gender
     *
     * @return array
     */
    const GENDER = [
        [
            'value' => 'Pria',
            'label' => 'Pria',
        ],
        [
            'value' => 'Wanita',
            'label' => 'Wanita',
        ],
    ];

    /**
     * User account status
     *
     * @return collection
     */
    public static function getTransactionType(): Collection
    {
        return collect(self::TRANSACTION_TYPE);
    }

    /**
     * User account status
     *
     * @return array
     */
    public static function getNavigationPlacement(): array
    {
        return json_decode(json_encode(self::NAVIGATION_PLACEMENT), false);
    }

    /**
     * User account status
     *
     * @return array
     */
    public static function getPostType(): array
    {
        return json_decode(json_encode(self::POST_TYPE), false);
    }

    /**
     * User account status
     *
     * @return array
     */
    public static function getUserStatus(): array
    {
        return json_decode(json_encode(self::USER_STATUS), false);
    }

    /**
     * Product type
     *
     * @return array
     */
    public static function getProductType(): array
    {
        return json_decode(json_encode(self::PRODUCT_TYPE), false);
    }

    /**
     * Boolean active state
     *
     * @return array
     */
    public static function getBoolean(): array
    {
        return json_decode(json_encode(self::BOOLEAN), false);
    }

    /**
     * Active state
     *
     * @return array
     */
    public static function getActiveState(): array
    {
        return json_decode(json_encode(self::ACTIVE_STATE), false);
    }

    /**
     * Order status
     *
     * @return array
     */
    public static function getOrderStatus(): array
    {
        return json_decode(json_encode(self::ORDER_STATUS), false);
    }

    /**
     * Stock status
     *
     * @return array
     */
    public static function getStockStatus(): array
    {
        return json_decode(json_encode(self::STOCK_STATUS), false);
    }

    /**
     * Poin type
     *
     * @return array
     */
    public static function getPoinType(): array
    {
        return json_decode(json_encode(self::POINT_TYPE), false);
    }

    /**
     * Setting Group
     *
     * @return array
     */
    public static function getSettingGroup(): array
    {
        return json_decode(json_encode(self::SETTING_GROUP), false);
    }

    /**
     * Order from
     *
     * @return array
     */
    public static function getOrderFrom(): array
    {
        return json_decode(json_encode(self::ORDER_FROM), false);
    }

    /**
     * Payment Method
     *
     * @return array
     */
    public static function getPaymentMethod(): array
    {
        return json_decode(json_encode(self::PAYMENT_METHOD), false);
    }

    /**
     * Gender
     *
     * @return array
     */
    public static function getGender(): array
    {
        return json_decode(json_encode(self::GENDER), false);
    }
}
