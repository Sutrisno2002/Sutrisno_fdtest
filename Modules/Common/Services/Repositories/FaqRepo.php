<?php

namespace Modules\Common\Services\Repositories;

use Modules\Common\Models\Faq;

class FaqRepo
{
    /**
     * Get all public faq data from resource
     * with specific request
     *
     * @param  object $request
     * @param  int $total
     * @return Illuminate\Contracts\Pagination\Paginator
     */
    public function getPublicFaqs(object $request, $total = 10)
    {
        $faq = Faq::query()->where('is_active', true)->where('is_featured', true);

        if (isset($request->search)) {
            if ($request->search) {
                $faq->search($request);
            }
        }

        if (isset($request->category)) {
            if ($request->category) {
                $faq->category($request);
            }
        }

        return $faq->sort($request)->paginate($total);
    }

    /**
     * Get all featured faq data from resource
     * with specific request
     *
     * @param  object $request
     * @param  int $total
     * @return Illuminate\Contracts\Pagination\Paginator
     */
    public function getFeaturedFaqs(object $request, $total = 5)
    {
        $faq = Faq::query()->where([
            'is_featured' => true,
            'is_active' => true,
        ]);

        return $faq->sort($request)
            ->limit($total)
            ->get();
    }

    /**
     * Get all faq data from resource
     * with specific request
     *
     * @param  object $request
     * @param  int $total
     * @return Illuminate\Contracts\Pagination\Paginator
     */
    public function filters(object $request, $total = 10)
    {
        $faq = Faq::query()->with(['category:id,name,slug']);

        if (isset($request->search)) {
            if ($request->search) {
                $faq->search($request);
            }
        }

        if (isset($request->featured)) {
            if ($request->featured == 'true') {
                $faq->where('is_featured', true);
            }
        }

        if (isset($request->category)) {
            if ($request->category) {
                $faq->category($request);
            }
        }

        return $faq->sort($request)->paginate($total);
    }
}
