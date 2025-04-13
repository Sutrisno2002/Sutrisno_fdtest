<?php

namespace Modules\Common\Services\Repositories;

use Modules\Common\Contracts\ArrayPagination;
use Modules\Common\Models\Category;

class CategoryRepo
{
    use ArrayPagination;

    /**
     * Get active categories for public
     *
     * @param  object $request
     * @param  int $limit
     * @param  boolean $paginated
     * @return Category
     * @return Illuminate\Contracts\Pagination\Paginator
     */
    public function getPublicCategories(object $request, $limit = 5, $paginated = true)
    {
        $categories = Category::query()->active()
            ->when(isset($request->featured), function ($query) use ($request) {
                if ($request->featured) {
                    $query->featured();
                } else {
                    $query->notFeatured();
                }
            })
            ->when(isset($request->group), function ($query) use ($request) {
                $query->group($request);
            })
            ->orderBy('sort_order', 'asc');

        if (!$paginated) {
            return $categories->limit($limit)->get(['id', 'slug', 'name']);
        }

        return $categories->paginate($limit);
    }

    /**
     * Get last position by specific category
     *
     * @param  string $tableReference
     * @return Category
     */
    public function getParentLastPosition(object $request)
    {
        $category = Category::query()->group($request);
        return $category->getParentLastPosition($request)
            ->orderBy('sort_order', 'desc')
            ->first();
    }

    /**
     * Get last position by specific parent
     *
     * @param  string $tableReference
     * @return Category
     */
    public function getChildLastPosition(object $request)
    {
        $category = Category::query()->group($request);
        return $category->category($request)
            ->orderBy('sort_order', 'desc')
            ->first();
    }

    /**
     * Get all categories data from resource
     * with specific request
     *
     * @param  object $request
     * @param  int $total
     * @return Illuminate\Contracts\Pagination\Paginator
     */
    public function filters(object $request, $total = 10)
    {
        $categories = Category::query()->whereNull('parent_id');

        if (isset($request->search)) {
            if ($request->search) {
                $categories->search($request);
            }
        }

        if (isset($request->category)) {
            if ($request->category) {
                $categories->category($request);
            }
        }

        if (isset($request->group)) {
            if ($request->group) {
                $categories->where('group', 'REGEXP', $request->group);
            }
        }

        return $categories->sort($request)->paginate($total);
    }

    /**
     * Get get parent categories
     *
     * @return Category
     */
    public function getParentCategories()
    {
        $parentCategories = Category::query()->orderBy('sort_order')
            ->whereNull('parent_id');

        return $parentCategories->get();
    }

    /**
     * Get child categories
     *
     * @param  object $request
     * @param  int $total
     * @return Illuminate\Contracts\Pagination\Paginator
     */
    public function getChilds(object $request, $total = 10)
    {
        $parent = Category::where('slug', $request->slug)->first();

        if ($parent) {
            $childs = Category::where('parent_id', $parent->id)->orderBy('sort_order');

            if (isset($request->search)) {
                if ($request->search) {
                    $childs->search($request);
                }
            }

            return $childs->paginate($total);
        }

        return $this->paginate([]);
    }
}
