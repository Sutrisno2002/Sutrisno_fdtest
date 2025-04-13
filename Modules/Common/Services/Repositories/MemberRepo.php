<?php

namespace Modules\Common\Services\Repositories;

use Carbon\Carbon;
use Modules\Common\Models\Province;
use Modules\Volunteers\Models\Member;

class MemberRepo
{
    /**
     * Get all pages data from resource
     * with specific request
     *
     * @param  object $request
     * @param  int $total
     * @return Illuminate\Contracts\Pagination\Paginator
     */
    public function filters(object $request, $total = 12, $paginated = true)
    {
        $members = Member::query();

        if (isset($request->search)) {
            if ($request->search) {
                $members->search($request);
            }
        }
        
        if (isset($request->age)) {
            if ($request->age) {
                $members->age($request);
            }
        }

        if (isset($request->gender)) {
            if ($request->gender) {
                $members->gender($request);
            }
        }

        if (isset($request->province)) {
            if ($request->province) {
                $members->province($request);
            }
        }
        if (isset($request->regency)) {
            if ($request->regency) {
                $members->regency($request);
            }
        }
        if (isset($request->district)) {
            if ($request->district) {
                $members->district($request);
            }
        }
        if (isset($request->village)) {
            if ($request->village) {
                $members->village($request);
            }
        }

        if (isset($request->onlyTrashed)) {
            if ($request->onlyTrashed) {
                $members->onlyTrashed();
            }
        }

        if (isset($request->status)) {
            if ($request->status) {
                if ($request->status == 'active') {
                    $members->where('status', 'active');
                }
                if ($request->status == 'inactive') {
                    $members->where('status', 'inactive');
                }
            }
        }

        if (isset($request->verify)) {
            if ($request->verify == 'verified') {
                $members->whereNotNull('verified_by')->whereNotNull('verified_at');
            } elseif ($request->verify == 'not_verified') {
                $members->whereNull('verified_by')->whereNull('verified_at');
            }
        }

        if (isset($request->kta_sent)) {
            if ($request->kta_sent) {
                $members->whereNotNull('kta_send_email');
            } else {
                $members->whereNull('kta_send_email');
            }
        }

        return $members->sort($request)->paginate($total);
    }

    /**
     * Get gender chart data
     *
     * @return array [label, data]
     */
    public function getGenderData(): array
    {
        $member = Member::get();

        $data = collect($member->groupBy('gender')->all());
        $mapped = $data->map(function ($q) use ($data, $member) {
            $data = count($q) * 100 / $member->count();
            $count = count($q);
            return [
                'label' => $q->first()->gender,
                'data' => round($data, 1),
                'count' => $count,
            ];
        });

        return [
            'label' => $mapped->pluck('label'),
            'data' => $mapped->pluck('data')->toArray(),
            'count' => $mapped->pluck('count')->toArray(),
        ];
    }

    /**
     * Get age chart data
     *
     * @return array
     */
    public function getAgeData(): array
    {
        $ranges = [ // the start of each age-range.
            '17-26' => 17,
            '27-42' => 27,
            '43-58' => 43,
            '59-68' => 59,
            '69-77' => 69,
            '78-95' => 78,
            '96-101' => 96,
        ];

        $output = Member::get();
        $sum_member = count($output);
        $data = $output->map(function ($user) use ($ranges) {
            $age = Carbon::parse($user->date_of_birth)->age;
            foreach ($ranges as $key => $breakpoint) {
                if ($breakpoint >= $age) {
                    $user->range = $key;
                    break;
                }
            }
            return $user;
        })
            ->mapToGroups(function ($user, $key) {
                return [$user->range => $user];
            })
            ->map(function ($group) use ($sum_member) {
                return [
                    'label' => $group->first()->range,
                    'data' => round(count($group) / $sum_member * 100, 1),
                    'count' => count($group),
                ];
            })
            ->sortKeys();

        return [
            'label' => $data->pluck('label'),
            'data' => $data->pluck('data')->toArray(),
            'count' => $data->pluck('count')->toArray(),
        ];
    }

    /**
     * Get province chart data
     *
     * @return array
     */
    public function getProvinceData(): array
    {
        $label = Province::select('id', 'name')->get()->toArray();
        $output = Member::get();
        $sum_member = count($output);
        $data = $output->map(function ($user) use ($label) {
            foreach ($label as $breakpoint) {
                if ($breakpoint['id'] == $user->province_id) {
                    $user->province = $breakpoint['name'];
                    break;
                }
            }
            return $user;
        })
            ->mapToGroups(function ($user, $key) {
                return [$user->province => $user];
            })
            ->map(function ($group) use ($sum_member) {
                return [
                    'label' => $group->first()->province,
                    'data' => round(count($group) / $sum_member * 100, 1),
                    'count' => count($group),
                ];
            })
            ->sortKeys();
        return [
            'label' => $data->pluck('label'),
            'data' => $data->pluck('data')->toArray(),
            'count' => $data->pluck('count')->toArray(),
        ];
    }
}
