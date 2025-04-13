<?php

namespace Modules\Core\Services\Filterables;

trait UserFilters
{
    /**
     * Generate user avatar
     * based on avatar column
     *
     * @return string
     */
    public function getAvatar()
    {
        return $this->avatar ? url($this->avatar) : 'https://ui-avatars.com/api/?name=' . $this->name;
    }

    /**
     * Generate verified status (badge)
     * based on email_verified_at column
     *
     * @return string
     */
    public function verifiedBadge()
    {
        // Email verified
        if ($this->email_verified_at) {
            return '<div class="badge soft-primary" title="' . dateTimeTranslated($this->email_verified_at) . '">
                Sudah
            </div>';
        }

        // Not yet verified
        return '<div class="badge soft-dark">Belum</div>';
    }

    /**
     * Generate verified status (badge)
     * based on status column
     *
     * @return string
     */
    public function activeBadge()
    {
        if ($this->status == 'active') {
            return '<div class="badge soft-success">Aktif</div>';
        } elseif ($this->status == 'inactive') {
            return '<div class="badge soft-dark">Tidak Aktif</div>';
        } elseif ($this->status == 'disable') {
            return '<div class="badge soft-danger">Ditangguhkan</div>';
        } else {
            return '<div class="badge soft-dark">-</div>';
        }
    }

    /**
     * Generate verified status (badge)
     * based on email_verified_at column
     *
     * @return string
     */
    public function roleBadges()
    {
        $roles = '';
        foreach ($this->roles as $role) {
            $roles .= '<div class="badge soft-dark">' . $role->name . '</div>';
        }

        return ' <div class="flex flex-wrap gap-2">' . $roles . '</div>';
    }

    /**
     * Handle search query in the User Table
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return void
     */
    public function scopeSearch($query, $request)
    {
        if (isset($request->search)) {
            return $query->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%')
                ->orWhereHas('roles', function ($relation) use ($request) {
                    return $relation->where('name', 'like', '%' . $request->search . '%');
                });
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
}
