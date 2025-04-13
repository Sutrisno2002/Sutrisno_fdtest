<?php

namespace Modules\Common\Enums;

use Exception;

enum GuestMessageTopic: string
{
    /**
     * Define static string values
     *
     * @static MARKETING
     * @static SUPPORT
     * @static HELPDESK
     */
    case MARKETING = 'marketing';
    case SUPPORT = 'support';
    case HELPDESK = 'helpdesk';

    /**
     * Define slug of single enum
     * @return string
     */
    public function slug()
    {
        return match ($this) {
            self::MARKETING => 'marketing',
            self::SUPPORT => 'support',
            self::HELPDESK => 'help-desk',
        };
    }

    /**
     * Define translated slug of single enum
     * @return string
     */
    public function translated()
    {
        return match ($this) {
            self::MARKETING => 'pemasaran',
            self::SUPPORT => 'teknis',
            self::HELPDESK => 'pusat bantuan',
        };
    }

    /**
     * Define translated slug of single enum
     * @return string
     */
    public function translatedSlug()
    {
        return match ($this) {
            self::MARKETING => 'pemasaran',
            self::SUPPORT => 'teknis',
            self::HELPDESK => 'pusat-bantuan',
        };
    }
}
