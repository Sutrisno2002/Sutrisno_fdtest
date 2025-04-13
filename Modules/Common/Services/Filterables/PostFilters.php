<?php

namespace Modules\Common\Services\Filterables;

trait PostFilters
{
    /**
     * Get array of tags
     *
     * @return array
     */
    public function getTags()
    {
        return explode(',', $this->tags);
    }

    /**
     * Get post thumbnail
     * @return string
     */
    public function getThumbnail()
    {
        return $this->thumbnail ? url($this->thumbnail) : cache('thumbnail');
    }

    /**
     * Get post visibility
     *
     * @return string
     */
    public function getPostVisibility()
    {
        if ($this->archived_at) {
            return '<small class="badge badge-dark badge-pill mr-2 mb-2">Diarsipkan</small>';
        } elseif ($this->published_at) {
            return '<small class="badge badge-primary badge-pill mr-2 mb-2">Publish</small>';
        } elseif (!$this->published_at) {
            return '<small class="badge badge-secondary badge-pill mr-2 mb-2">Draft</small>';
        }
    }

    /**
     * Handle query to find published post
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at')
            ->whereNotNull('published_by')
            ->whereNull('archived_at');
    }

    /**
     * Handle query to find archived post
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeArchived($query)
    {
        return $query->whereNotNull('archived_at');
    }

    /**
     * Handle query to find draft post
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeDraft($query)
    {
        return $query->whereNull('published_at')
            ->whereNull('archived_at');
    }

    /**
     * Handle query to find tag post
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeTag($query, $request)
    {
        if (isset($request->tag)) {
            return $query->where('tags', 'like', '%' . $request->tag . '%');
            // return $query->where('tags', 'REGEXP', str_replace(',', '|', $query->tags));
        }
    }

    /**
     * Handle query to find post type
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeType($query, $request)
    {
        if (isset($request->type)) {
            return $query->where('type', $request->type);
        }
    }

    /**
     * Handle query to find post editor
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeEditor($query, $request)
    {
        if (isset($request->editor)) {
            return $query->whereHas('editor', function ($query) use ($request) {
                $query->where('id', $request->editor)
                    ->orWhere('email', $request->editor);
            });
        }
    }

    /**
     * Handle query to find post author
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeAuthor($query, $request)
    {
        $request = (object) $request;
        if (isset($request->author)) {
            return $query->whereHas('writer', function ($query) use ($request) {
                $query->where('id', $request->author)
                    ->orWhere('email', $request->author);
            });
        }
    }

    /**
     * Handle query to find post
     *
     * @param  Illuminate\Database\Eloquent\Builder $query
     * @param  object $request
     * @return Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch($query, $request)
    {
        if (isset($request->search)) {
            return $query->where(function ($query) use ($request) {
                $query->where('title', 'REGEXP', trim_regexp($request->search))
                    ->orWhere('slug_title', 'REGEXP', trim_regexp($request->search))
                    ->orWhere('subject', 'REGEXP', trim_regexp($request->search))
                    ->orWhere('tags', 'REGEXP', trim_regexp($request->search));
            });
        }
    }
}
