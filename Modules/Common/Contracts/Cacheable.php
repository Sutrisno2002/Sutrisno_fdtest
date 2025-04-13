<?php

namespace Modules\Common\Contracts;

use Illuminate\Support\Facades\Cache;

trait Cacheable
{
    /**
     * Update existing cache from laravel driver
     *
     * @param  string $key
     * @param  string|object|array|mixed $value
     * @return void
     */
    public function updateCache(?string $key, mixed $value)
    {
        Cache::forget($key);
        Cache::forever($key, $value);
    }

    /**
     * Remove single cache from laravel driver
     *
     * @param  string $key
     * @return void
     */
    public function removeCache(?string $key)
    {
        Cache::forget($key);
    }

    /**
     * Remove multiple cache from laravel driver
     *
     * @param  array $keys
     * @return void
     */
    public function removeCaches(?array $keys)
    {
        foreach ($keys as $key) {
            Cache::forget($key);
        }
    }
}
