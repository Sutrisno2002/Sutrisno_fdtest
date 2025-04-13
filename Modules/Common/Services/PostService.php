<?php

namespace Modules\Common\Services;

class PostService
{
    /**
     * Generate reading time by post description length
     * Normal reading time 130 word/min.
     *
     * @param  string $description
     * @return string reading time
     */
    public static function generateReadingTime(string $description): string
    {
        return round(str_word_count(strip_tags($description)) / 130, 1) . ' Menit';
    }
}
