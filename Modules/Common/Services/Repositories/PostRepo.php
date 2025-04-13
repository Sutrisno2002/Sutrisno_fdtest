<?php

namespace Modules\Common\Services\Repositories;

use stdClass;
use Modules\Common\Models\Post;

class PostRepo
{
    /**
     * Get popular posts
     * used by calling static method and pass string time
     * In: [this-week, this-month, this-year ]
     *
     * @param  string $postTypeName
     * @param  string $time in [this-week, this-month, this-year]
     * @param  int $total
     * @return Modules\Common\Models\Post
     */
    public function getPopularPosts($total = 4)
    {
        $posts = Post::query();
        $posts->published();
        // ->where(function ($post) {
        //     $post->where('number_of_views', '>', 50)
        //         ->orWhere('number_of_shares', '>', 20);
        // });

        return $posts->orderBy('number_of_views', 'desc')
            ->limit($total)->get();
    }

    /**
     * Find related post by the same tags
     *
     * @param  string $tags
     * @param  int $total
     * @return Modules\Common\Models\Post
     */
    public function getRelatedPosts(string $tags, $total = 5)
    {
        $posts = Post::query()->published()
            ->where('tags', 'REGEXP', str_replace(',', '|', $tags));

        return $posts->orderBy('published_at', 'desc')
            ->limit($total)->get();
    }

    /**
     * Get public posts
     * Use by calling static method and pass the request on array
     *
     * @param  object $request [search, type, tag, category]
     * @param  int $total
     * @return Modules\Common\Models\Post
     */
    public function getPublicPosts(object $request, $total = 10)
    {
        $posts = Post::with('writer')->published();

        // Check if props below is true/not empty
        if (isset($request->search) && $request->search) {
            $posts->where('author', 'like', '%' . $request->search . '%');
        }

        if (isset($request->rating) && $request->rating) {
            $posts->where('rating', $request->rating);
        }
        

        if (isset($request->date_start)) {
            $posts->when($request->date_start === '', function ($query) {
                // Jika tidak ada filter tanggal, ambil semua
            })->when($request->date_start === 'today', function ($query) {
                $query->whereDate('created_at', now()->toDateString());
            })->when($request->date_start === 'this_week', function ($query) {
                $query->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);
            })->when($request->date_start === 'this_month', function ($query) {
                $query->whereMonth('created_at', now()->month);
            })->when($request->date_start === 'three_months', function ($query) {
                $query->whereBetween('created_at', [now()->subMonths(3), now()]);
            })->when($request->date_start === 'six_months', function ($query) {
                $query->whereBetween('created_at', [now()->subMonths(6), now()]);
            });
        }

        // Get by writer
        if (isset($request->author)) {
            if ($request->author) {
                $posts->orWherehas('writer', function ($query) use ($request) {
                    $query->where('email', $request->author);
                });
            }
        }

        // Get by date
        if (isset($request->date_start) && isset($request->date_end)) {
            if ($request->date_start && $request->date_end) {
                $posts->whereBetween('published_at', [$request->date_start, $request->date_end]);
            }

            if (!$request->date_start && $request->date_end) {
                $posts->whereDate('published_at', '<=', $request->date_end);
            }

            if ($request->date_start && !$request->date_end) {
                $posts->whereDate('published_at', '>=', $request->date_start);
            }
        }

        if (isset($request->sort)) {
            $posts->sort(self::switchSort($request->sort));
        };

        return $posts->paginate($total);
    }

    /**
     * Get all posts by choosen category
     *
     * @param  string $category
     * @param  boolean $paginated
     * @param  int $total
     * @param  string $subCategory
     * @return void
     */
    public function getByCategory($category, $paginated = false, $total = 6, $subCategory = null)
    {
        $posts = Post::with('writer')
            ->published()
            ->category((object) [
                'category' => $category,
            ]);

        if ($subCategory) {
            $posts->subcategory((object) [
                'subCategory' => $subCategory,
            ]);
        }

        if ($paginated) {
            return $posts
                ->orderBy('published_at', 'desc')
                ->paginate($total);
        }

        return $posts->limit($total)
            ->orderBy('published_at', 'desc')
            ->get();
    }

    /**
     * Get latest post from resource
     *
     * @param  int $total
     * @return Modules\Common\Models\Post
     */
    public function getLatestPosts($total = 5)
    {
        $posts = Post::with('writer')->published();
        return $posts->orderBy('published_at', 'desc')->paginate($total);
    }

    /**
     * Get latest post by choosen category
     *
     * @param  object $request
     * @param  int $total
     * @return Modules\Common\Models\Post
     */
    public function getLatestPostsByCategory(object $request, $total = 5)
    {
        $posts = Post::with('writer')->published();

        if (isset($request->type)) {
            if ($request->type) {
                $posts->type($request);
            }
        }

        if (isset($request->category)) {
            if ($request->category) {
                $posts->category($request);
            }
        }

        return $posts->orderBy('published_at', 'desc')->limit($total)->get();
    }

    /**
     * Get random post
     *
     * @param  string $exceptSlug
     * @param  string $type
     * @param  int $total
     * @return Modules\Common\Models\Post
     */
    public function getRandomPosts($exceptSlug = null, $type = null, $total = 5)
    {
        $posts = Post::with('writer')->published();

        if ($type) {
            $posts->type((object) [
                'type' => $type,
            ]);
        }

        if ($exceptSlug) {
            $posts->where('slug_title', '!=', $exceptSlug);
        }

        return $posts->inRandomOrder()->limit($total)->get();
    }

    /**
     * Show public post
     * Used by calling static method and pass string slug title
     *
     * @param  string $slug_title
     * @return voModules\Common\Models\Postid
     */
    public function showPublicPost(string $slug_title, $is_publish = true)
    {
        $post = Post::query()
            ->where('slug_title', $slug_title);

        if ($is_publish) {
            $post->published();
        }

        return $post->firstOrFail();
    }

    /**
     * Filter query
     * Use by calling static method and pass the request on array
     *
     * @param  object $request
     * @param  int $total
     * @return Modules\Common\Models\Post
     */
    public function filters(object $request, $total = 10, $paginated = true)
    {
        $posts = Post::query()->with( 'writer:id,name,email', 'editor:id,name,email');

        // Check if props below is true/not empty
        if (isset($request->search)) {
            if ($request->search) {
                $posts->search($request);
            }
        }

        // Check if props below is true/not empty
        if (isset($request->category)) {
            if ($request->category) {
                $posts->category($request);
            }
        }

        // Check if props below is true/not empty
        if (isset($request->type)) {
            if ($request->type) {
                $posts->type($request);
            }
        }

        // Check if props below is true/not empty
        if (isset($request->status)) {
            if ($request->status) {
                if ($request->status == 'published') {
                    $posts->published();
                }
                if ($request->status == 'draft') {
                    $posts->draft();
                }
                if ($request->status == 'archived') {
                    $posts->archived();
                }
            }
        }

        // Check if props below is true/not empty
       

        if (isset($request->date_start) && isset($request->date_end)) {
            if ($request->date_start && $request->date_end) {
                $posts->whereBetween('published_at', [$request->date_start, $request->date_end]);
            }
        }

        if (!$paginated) {
            return $posts->sort($request)->get();
        }

        return $posts->sort($request)->paginate($total);
    }

    /**
     * Post with not yes approved status
     *
     * @return Modules\Common\Models\Post
     */
    public function notYetApproved()
    {
        $posts = Post::query()
            ->whereNull('approved_at');

        return $posts->orderBy('created_at', 'desc')->get();
    }

    public function countPost($closure)
    {
        $posts = Post::query();
        return $posts->count();
    }


    public function switchSort($request)
    {
        $response = new stdClass;
        switch ($request) {
            case 'title-a-z':
                $response->sort = 'title';
                $response->order = 'asc';
                return $response;
                break;

            case 'title-z-a':
                $response->sort = 'title';
                $response->order = 'desc';
                return $response;
                break;

            case 'newest':
                $response->sort = 'created_at';
                $response->order = 'desc';
                return $response;
                break;

            case 'oldest':
                $response->sort = 'created_at';
                $response->order = 'asc';
                return $response;
                break;

            default:
                $response->sort = 'created_at';
                $response->order = 'desc';
                return $response;
                break;
        }
    }
}
