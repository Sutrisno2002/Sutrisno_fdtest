<?php

use Brick\Money\Money;
use Carbon\CarbonPeriod;
use Carbon\CarbonInterval;
use Whitecube\Price\Price;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Brick\PhoneNumber\PhoneNumber;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Pagination\Paginator;
use Modules\Core\Services\CoreCrypt;
use Brick\PhoneNumber\PhoneNumberFormat;
use Brick\PhoneNumber\PhoneNumberParseException;

if (!function_exists('activeRouteIs')) {
    /**
     * Check route name and get active class name.
     *
     * @param  string|array $routeName
     * @param  string $active
     * @return string
     */
    function activeRouteIs($routeName, $active = 'active'): String
    {
        if (is_array($routeName)) {
            $state = false;
            foreach ($routeName as $route) {
                if (request()->routeIs($route)) {
                    $state = true;
                }
            };
            return $state ? $active : '';
        }
        return request()->routeIs($routeName) ? $active : '';
    }
}

if (!function_exists('slug')) {
    /**
     * Get slug ot the given string data.
     *
     * @param  string $string
     * @return string
     */
    function slug($string): String
    {
        return Str::slug($string) . '-' . now()->format('u');
    }
}

if (!function_exists('unSlug')) {
    /**
     * Replace underscore or dash with space.
     *
     * @param  string $slug
     * @return string
     */
    function unSlug($slug): String
    {
        return str_replace('_', ' ', str_replace('-', ' ', $slug));
    }
}

if (!function_exists('xssFilter')) {
    /**
     * Filter data entered from cross site scripting.
     *
     * @param  string $text
     * @return string
     */
    function xssFilter($text): String
    {
        return preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $text);
    }
}

if (!function_exists('age')) {
    /**
     * Get age of the given date.
     *
     * @param  string $date
     * @param  string $term
     * @return string
     */
    function age($date, $term = ' th')
    {
        return $date ? Carbon::parse($date)->age . $term : null;
    }
}

if (!function_exists('birth_date')) {
    /**
     * Format birth date to 'DD NamaBulan YYYY'.
     *
     * @param  string $date
     * @return string|null
     */
    function birth_date($date)
    {
        if (!$date) {
            return null;
        }

        // Parse date using Carbon
        $parsedDate = Carbon::parse($date);

        // Define month names in Bahasa
        $months = [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];

        // Format the date
        return $parsedDate->day . ' ' . $months[$parsedDate->month] . ' ' . $parsedDate->year;
    }
}


if (!function_exists('diffForHuman')) {
    /**
     * Get date time into human format.
     *
     * @param  string $date
     * @return string|null
     */
    function diffForHuman($date)
    {
        return $date ? Carbon::parse($date)->diffForHumans() : null;
    }
}

if (!function_exists('user')) {
    /**
     * Get authenticated user.
     *
     * @param  string $column
     * @param  string $guard
     * @return User
     */
    function user($column = null, $guard = 'web')
    {
        $user = auth($guard)->user();

        if ($user && $column) {
            return $user->$column;
        }

        return $user ? $user : null;
    }
}

if (!function_exists('numberShortner')) {
    /**
     * Shorten the number to units according
     * to the number entered.
     *
     * @param  double|int $number
     * @return string
     */
    function numberShortner($number): STring
    {
        if ($number >= 0 && $number < 1000) {
            // 1 - 999
            $number_format = floor($number);
            $suffix = '';
        } else if ($number >= 1000 && $number < 1000000) {
            // 1k-999k
            $number_format = floor($number / 1000);
            $suffix = 'K+';
        } else if ($number >= 1000000 && $number < 1000000000) {
            // 1m-999m
            $number_format = floor($number / 1000000);
            $suffix = 'M+';
        } else if ($number >= 1000000000 && $number < 1000000000000) {
            // 1b-999b
            $number_format = floor($number / 1000000000);
            $suffix = 'B+';
        } else if ($number >= 1000000000000) {
            // 1t+
            $number_format = floor($number / 1000000000000);
            $suffix = 'T+';
        }

        return !empty($number_format . $suffix) ? $number_format . $suffix : 0;
    }
}

if (!function_exists('switchDate')) {
    /**
     * Convert filter strings to start, end and
     * metrics on google analytics.
     *
     * @param  string $slug
     * @return void
     */
    function switchDate($slug)
    {
        switch ($slug) {
            case 'today':
                return [
                    'startDate' => now(),
                    'endDate' => now(),
                    'metrics' => 'ga:date',
                ];
                break;

            case 'yesterday':
                return [
                    'startDate' => now()->subDay(1),
                    'endDate' => now()->subDay(1),
                    'metrics' => 'ga:date',
                ];
                break;

            case 'this-week':
                return [
                    'startDate' => now()->startOfWeek(),
                    'endDate' => now()->endOfWeek(),
                    'metrics' => 'ga:date',
                ];
                break;

            case 'this-month':
                return [
                    'startDate' => now()->startOfMonth(),
                    'endDate' => now(),
                    'metrics' => 'ga:date',
                ];
                break;

            case 'this-year':
                return [
                    'startDate' => now()->startOfYear(),
                    'endDate' => now()->endOfYear(),
                    'metrics' => 'ga:month',
                ];
                break;

            case 'last-7-days':
                return [
                    'startDate' => now()->subDays(6),
                    'endDate' => now(),
                    'metrics' => 'ga:date',
                ];
                break;

            case 'last-30-days':
                return [
                    'startDate' => now()->subDays(29),
                    'endDate' => now(),
                    'metrics' => 'ga:date',
                ];
                break;

            case 'last-90-days':
                return [
                    'startDate' => now()->subDays(89),
                    'endDate' => now(),
                    'metrics' => 'ga:date',
                ];
                break;

            case 'one-year':
                return [
                    'startDate' => now()->subYear(1),
                    'endDate' => now()->endOfYear(),
                    'metrics' => 'ga:yearMonth',
                ];
                break;

            default:
                return [
                    'startDate' => now()->startOfYear(),
                    'endDate' => now()->endOfYear(),
                    'metrics' => 'ga:month',
                ];
                break;
        }
    }
}

if (!function_exists('switchOrderStatusToRaw')) {
    /**
     * Convert filter strings order status to raw format
     *
     * @param  string $slug
     * @return string
     */
    function switchOrderStatusToRaw($slug)
    {
        switch ($slug) {
            case 'belum-dibayar':
                return 'PENDING';
                break;

            case 'telah-dibayar':
                return 'COMPLETE';
                break;

            case 'kadaluarsa':
                return 'EXPIRED';
                break;

            case 'dibatalkan':
                return 'CANCEL';
                break;

            default:
                return 'PENDING';
                break;
        }
    }
}

if (!function_exists('number')) {
    /**
     * Provide usual numbers into number format
     *
     * @param  double|int $number
     * @param  double|int $decimals
     * @return string
     */
    function number($number, $decimals = 2)
    {
        try {
            return number_format(preg_replace('/\D/', '', $number), $decimals, ',', '.');
        } catch (Exception $exeception) {
            return null;
        }
    }
}

if (!function_exists('getFullDate')) {
    /**
     * Get full date time by given date
     *
     * @param  string $date
     * @param  string $format
     * @param  string $locale
     * @return string
     */
    function getFullDate($date, $format = 'l, d F Y', $locale = 'id')
    {
        try {
            return Carbon::parse($date)->locale($locale)->translatedFormat($format);
        } catch (Exception $exeception) {
            return null;
        }
    }
}

if (!function_exists('dateTimeTranslated')) {
    /**
     * Get translated date time by given date
     *
     * @param  string $date
     * @param  string $format
     * @param  string $locale
     * @return string
     */
    function dateTimeTranslated($date, $format = 'D, d M Y', $locale = 'id')
    {
        try {
            return Carbon::parse($date)->locale($locale)->translatedFormat($format);
        } catch (Exception $exeception) {
            return null;
        }
    }
}

if (!function_exists('phone')) {
    /**
     * Remove symbols from phone number
     *
     * @param  string $number
     * @return int
     */
    function phone($number, $region_code = 'ID', $format = 'E164')
    {
        if (!$number) {
            return null;
        }

        try {
            $number = PhoneNumber::parse($number, $region_code);

            if ($format == 'INTERNATIONAL') {
                return $number->format(PhoneNumberFormat::INTERNATIONAL);
            } elseif ($format == 'NATIONAL') {
                return $number->format(PhoneNumberFormat::NATIONAL);
            } elseif ($format == 'RFC3966') {
                return $number->format(PhoneNumberFormat::RFC3966);
            }

            return $number->format(PhoneNumberFormat::E164);
        } catch (PhoneNumberParseException $e) {
            throw $e;
        }
    }
}

if (!function_exists('unphone')) {
    /**
     * Convert international phone number format to local format
     *
     * @param  string $number
     * @param  string $region_code
     * @return string|null
     */
    function unphone($number, $region_code = 'ID')
    {
        if (!$number) {
            return null;
        }

        try {
            // Parse the phone number with the provided region code
            $parsed_number = PhoneNumber::parse($number, $region_code);

            // Return the number in NATIONAL format without spaces or dashes
            return preg_replace('/\D/', '', $parsed_number->format(PhoneNumberFormat::NATIONAL));
        } catch (PhoneNumberParseException $e) {
            throw $e;
        }
    }
}


if (!function_exists('title')) {
    /**
     * Transform formated string into capitalized format
     *
     * @param  string $text
     * @return string
     */
    function title($text): String
    {
        try {
            return Str::title($text);
        } catch (Exception $exeception) {
            return null;
        }
    }
}

if (!function_exists('filterCollection')) {
    /**
     * Implement where like in laravel collection
     *
     * @param  collection $collection
     * @param  string $needle
     * @param  string $row
     * @return collection
     */
    function filterCollection($collection, $needle = '', $row = null): Collection
    {
        if ($collection instanceof Collection) {
            return $collection->filter(function ($data) use ($needle, $row) {
                return preg_match("/{$needle}/i", $data[$row]);
            });
        }

        throw new Exception('The data given is not a collection.', 1);
    }
}

if (!function_exists('userRole')) {
    /**
     * Check user role
     *
     * @param  string $role
     * @param  string $guard
     * @return boolean
     */
    function userRole($role, $guard = 'web')
    {
        return auth($guard)->user()->hasRole($role);
    }
}

if (!function_exists('userRoles')) {
    /**
     * Check user has any specific roles
     *
     * @param  array $roles
     * @param  string $guard
     * @return boolean
     */
    function userRoles(array $roles, $guard = 'web')
    {
        return auth($guard)->user()->hasAnyRole($roles);
    }
}

if (!function_exists('userCan')) {
    /**
     * Check user permission
     *
     * @param  string $permission
     * @param  string $guard
     * @return boolean
     */
    function userCan($permission, $guard = 'web')
    {
        return auth($guard)->user()->can($permission);
    }
}

if (!function_exists('userCanAny')) {
    /**
     * Check user has any specific permissions
     *
     * @param  array $permissions
     * @param  string $guard
     * @return boolean
     */
    function userCanAny(array $permissions, $guard = 'web')
    {
        return auth($guard)->user()->hasAnyPermission($permissions);
    }
}

if (!function_exists('diffForHumans')) {
    /**
     * Get humans read time from current
     * date and given date.
     *
     * @param  string $date
     * @return string
     */
    function diffForHumans($date, $locale = 'id')
    {
        try {
            return Carbon::parse($date)->locale($locale)->diffForHumans();
        } catch (Exception $exeception) {
            return '-';
        }
    }
}

if (!function_exists('sortable')) {
    /**
     * Sort order converter
     *
     * @param  string $param
     * @return array
     */
    function sortable($param): array
    {
        if ($param == 'nama-a-z') {
            return [
                'sort' => 'name',
                'order' => 'asc',
            ];
        } elseif ($param == 'nama-z-a') {
            return [
                'sort' => 'name',
                'order' => 'desc',
            ];
        } elseif ($param == 'harga-rendah-tinggi') {
            return [
                'sort' => 'price',
                'order' => 'asc',
            ];
        } elseif ($param == 'harga-tinggi-rendah') {
            return [
                'sort' => 'price',
                'order' => 'desc',
            ];
        }
        return [
            'sort' => 'created_at',
            'order' => 'desc',
        ];
    }
}

if (!function_exists('carbon')) {
    /**
     * Carbon time parser
     *
     * @param  string date $carbon
     * @return Carbon
     */
    function carbon($date)
    {
        try {
            return Carbon::parse($date);
        } catch (Exception $exeception) {
            return null;
        }
    }
}

if (!function_exists('createLog')) {
    /**
     * Create log file and update log inside file
     *
     * @param  string $log_file_name
     * @return Log
     */
    function createLog($log_file_name)
    {
        return Log::build([
            'driver' => 'single',
            'path' => storage_path('logs/' . $log_file_name . '.log'),
        ]);
    }
}

if (!function_exists('trim_regexp')) {
    /**
     * Create multiple phrase from string
     *
     * @param  string $keyword
     * @return void
     */
    function trim_regexp($keyword)
    {
        $words = explode(' ', $keyword);
        $patterns = [];
        foreach ($words as $word) {
            if (trim($word)) {
                array_push($patterns, trim($word));
            }
        }
        array_push($patterns, ltrim(rtrim($keyword)));

        return implode('|', $patterns);
    }
}

if (!function_exists('price')) {
    /**
     * Display price with currency and symbol
     *
     * @param  int $price
     * @param  boolean $format
     * @param  string $symbol
     * @param  string $currency
     * @return string|Money
     */
    function price(
        $price,
        $format = false,
        $fraction = 0,
        $symbol = 'Rp',
        $currency = 'IDR',
    ) {
        $formatter = new \NumberFormatter('id_ID', \NumberFormatter::CURRENCY);
        $formatter->setSymbol(\NumberFormatter::MONETARY_GROUPING_SEPARATOR_SYMBOL, ',');
        $formatter->setAttribute(\NumberFormatter::MIN_FRACTION_DIGITS, $fraction);

        // Add symbol to formatter
        if ($symbol) {
            $formatter->setSymbol(\NumberFormatter::CURRENCY_SYMBOL, $symbol);
        }

        // Get money of the given amount and currency
        $money = Money::of(intval($price), $currency);

        // Check if with format
        if ($format) {
            return $money->formatWith($formatter);
        }

        // Returns money with default format
        return $money;
    }
}

if (!function_exists('priceToNumber')) {
    /**
     * Convert formatted price into int price
     *
     * @param  string $value
     * @param  string $suffix
     * @return int
     */
    function priceToNumber(
        $value,
        $suffix = ',00'
    ) {
        $trim = substr($value, 0, -strlen($suffix));
        return preg_replace("/[^0-9]/", "", $trim);
    }
}

if (!function_exists('numberToPrice')) {
    /**
     * Convert number to string price
     *
     * @param  int $value
     * @param  int $decimals
     * @param  string $decimal_separator
     * @param  string $thousand_separator
     * @return string
     */
    function numberToPrice(
        $value,
        $decimals = 2,
        $decimal_separator = ',',
        $thousand_separator = '.'
    ) {
        return number_format(
            $value,
            $decimals,
            $decimal_separator,
            $thousand_separator
        );
    }
}

if (!function_exists('minutesToHours')) {
    /**
     * Get total hour from total minutes
     *
     * @param  int $minutes
     * @param  string $suffix
     * @param  boolean $withMinute
     * @return int|string
     */
    function minutesToHours(
        int $minutes,
        string $suffix = '',
        bool $withMinute = false
    ) {
        $hours = CarbonInterval::minutes($minutes)->cascade();

        // Return raw total hour
        if (!$suffix && !$withMinute) {
            return round($hours->totalHours, 1);
        }

        // Return with minute and hour
        if ($withMinute) {
            if ($hours->h) {
                return $hours->h . 'h ' . $hours->i . 'm';
            }

            return $hours->i . 'm';
        }

        // Return raw hours and suffix
        return round($hours->totalHours, 1) . $suffix;
    }
}

if (!function_exists('coreCrypt')) {
    /**
     * Encrypt or decrpypt some value
     *
     * @param  string $value
     * @param  string $mode [encrypt, decrypt]
     * @return string|null
     */
    function coreCrypt(
        string $value,
        string $mode = 'encrypt'
    ) {
        try {
            switch ($mode) {
                case 'encrypt':
                    return CoreCrypt::encrypt($value);
                    break;
                case 'decrypt':
                    return CoreCrypt::decrypt($value);
                    break;

                default:
                    return CoreCrypt::encrypt($value);
                    break;
            }
        } catch (Exception $exeception) {
            return null;
        }
    }
}

if (!function_exists('paginationInfo')) {
    /**
     * Get pagination info from paginator
     *
     * @param  Paginator $paginator
     * @return string|null
     */
    function paginationInfo($paginator)
    {
        try {
            $firstItem = $paginator->firstItem();
            $lastItem = $paginator->lastItem();

            if (!$firstItem && !$lastItem) {
                return null;
            }

            return 'Menampilkan ' . $firstItem . '-' . $lastItem . ' dari ' . $paginator->total();
        } catch (Exception $exeception) {
            return null;
        }
    }
}

if (!function_exists('randAlpha')) {
    /**
     * Get random alphabeth [A-Z, a-z] with specific length
     *
     * @param int $length
     */
    function randAlpha($length = 6)
    {
        try {
            $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz';
            return substr(str_shuffle($characters), 0, $length);
        } catch (Exception $exeception) {
            return null;
        }
    }
}

if (!function_exists('convertSecond')) {
    /**
     * Get video duration from YouTube video API
     *
     * @param  ?int $value
     * @return ?array
     */
    function convertSecond(?int $value)
    {
        try {
            return CarbonInterval::make($value);
        } catch (Exception $exception) {
            return null;
        }
    }
}

if (!function_exists('chartMetrics')) {
    /**
     * Get metrics chart conversion
     *
     * @param  ?array $dates dates[start], dates[end]
     * @return ?array
     */
    function chartMetrics(?array $dates)
    {
        try {
            $count = carbon($dates['start'])->diffInDays($dates['end']);
            $metrics = [];

            if ($count <= 7) {
                $periods = CarbonPeriod::create($dates['start'], $dates['end'])->locale('id');
                foreach ($periods as $period) {
                    $metrics[$period->translatedFormat('d M')] = [
                        'start' => $period->toDateString(),
                        'end' => $period->toDateString(),
                    ];
                }
            } elseif ($count > 7 && $count <= 31) {
                $periods = CarbonPeriod::create($dates['start'], $dates['end'])->locale('id');
                $chunk = array_chunk($periods->toArray(), 7);
                foreach ($chunk as $range) {
                    $start = array_shift($range);
                    $end = end($range);
                    $metrics[$start->translatedFormat('d M') . ' - ' . $end->translatedFormat('d M')] = [
                        'start' => $start->toDateString(),
                        'end' => $end->toDateString(),
                    ];
                }
            } elseif ($count > 31 && $count <= 183) {
                $periods = CarbonPeriod::create($dates['start'], $dates['end'])->locale('id');
                $chunk = array_chunk($periods->toArray(), 21);
                foreach ($chunk as $range) {
                    $start = array_shift($range);
                    $end = end($range);
                    $metrics[$start->translatedFormat('d M') . ' - ' . $end->translatedFormat('d M')] = [
                        'start' => $start->toDateString(),
                        'end' => $end->toDateString(),
                    ];
                }
            } elseif ($count > 183) {
                $periods = CarbonPeriod::create($dates['start'], '1 months', $dates['end'])->locale('id');
                $mapped = collect($periods)->map(fn ($period) => ['date' => $period, 'month' => $period->translatedFormat('M')])
                    ->groupBy('month');
                foreach ($mapped as $key => $value) {
                    $date = $value->pluck('date')->first();
                    if ($key === array_key_first($mapped->toArray())) {
                        $metrics[$key] = [
                            'start' =>  $periods->start->toDateString(),
                            'end' =>  $date->endOfMonth()->toDateString(),
                        ];
                    } elseif ($key === array_key_last($mapped->toArray())) {
                        $metrics[$key] = [
                            'start' =>  $date->startOfMonth()->toDateString(),
                            'end' =>  $periods->end->toDateString(),
                        ];
                    } else {
                        $metrics[$key] = [
                            'start' =>  $date->startOfMonth()->toDateString(),
                            'end' =>  $date->endOfMonth()->toDateString(),
                        ];
                    }
                }
            }

            return $metrics;
        } catch (Exception $exception) {
            throw $exception;
        }
    }
}
