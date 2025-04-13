<?php

namespace Modules\Common\Services\Filterables;

use Carbon\Carbon;

trait MemberFilters
{
    /**
     * Handle search query in the Page Table
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $request)
    {
        if (isset($request->search)) {
            return $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('address', 'like', '%' . $request->search . '%');
        }

        return $query;
    }

    /**
     * Handle query to sort in the User table
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return void
     */
    public function scopeSort($query, $request)
    {
        $columns = $query->getModel()->getFillable();

        // Check if column is exist in database table column
        // Handle errors column not found
        if (isset($request->sort) && isset($request->order)) {
            if (in_array($request->sort, $columns)) {
                // Check if order like asc or desc
                // Data will only show if column is available and order is available
                if ($request->order == 'asc' || $request->order == 'desc') {
                    $query->orderBy($request->sort, $request->order);
                }
            } else {
                // If column found, will return empty array
                return $query;
            }

        }

        return $query;
    }

    /**
     * Handle regency filter query in the gallery Table
     * @param  \Illuminate\Database\Eloquent\Model $query
     * @param  object $request
     * @return void
     */
    public function scopeProvince($query, $request)
    {
        if (isset($request->province)) {
            return $query->where('province_id', 'like', '%' . $request->province . '%');
        }

        return $query;
    }

    /**
     * Handle regency filter query in the gallery Table
     * @param  \Illuminate\Database\Eloquent\Model $query
     * @param  object $request
     * @return void
     */
    public function scopeRegency($query, $request)
    {
        if (isset($request->regency)) {
            return $query->where('regency_id', 'like', '%' . $request->regency . '%');
        }

        return $query;
    }

    /**
     * Handle regency filter query in the gallery Table
     * @param  \Illuminate\Database\Eloquent\Model $query
     * @param  object $request
     * @return void
     */
    public function scopeDistrict($query, $request)
    {
        if (isset($request->district)) {
            return $query->where('district_id', 'like', '%' . $request->district . '%');
        }

        return $query;
    }

    /**
     * Handle regency filter query in the gallery Table
     * @param  \Illuminate\Database\Eloquent\Model $query
     * @param  object $request
     * @return void
     */
    public function scopeVillage($query, $request)
    {
        if (isset($request->village)) {
            return $query->where('village_id', 'like', '%' . $request->village . '%');
        }

        return $query;
    }

    /**
     * Handle query to get specific gender
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return void
     */
    public function scopeGender($query, $request)
    {
        if (isset($request->gender)) {
            if (in_array($request->gender, ['pria', 'wanita'])) {
                $query->where('gender', $request->gender);
            }
        }
    }

    /**
     * Handle query to sort in the gallery table
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return void
     */
    public function scopeAge($query, $request)
    {
        if (isset($request->age)) {
            $age = explode('-', $request->age, 2);
            $minYear = Carbon::now()->format('Y') - $age[0];
            $minYearFormated = Carbon::create($minYear)->toDateTimeString();
            $maxYear = Carbon::now()->format('Y') - $age[1];
            $maxYearFormated = Carbon::create($maxYear)->toDateTimeString();

            return $query->whereBetween('date_of_birth', [$maxYearFormated, $minYearFormated]);
        }
    }

    /**
     * Generate verified status (badge)
     * based on status column
     *
     * @return string
     */
    public function statusBadge()
    {
        switch ($this->status) {
            case 'active':
                return '<div class="badge soft-success">Active</div>';
            case 'inactive':
                return '<div class="badge soft-danger">Inactive</div>';
            case 'disable':
                return '<div class="badge soft-dark">Disabled</div>';
        }
    }

    /**
     * Generate verified status (badge)
     * based on status column
     *
     * @return string
     */
    public function verifiedBadge()
    {
        if ($this->verified_at) {
            return '<div class="badge soft-primary">Verified</div>';
        } else {
            return '<div class="badge soft-warning">Not Verified</div>';
        }
    }
}
