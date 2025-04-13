<?php

namespace Modules\Front\Livewire\Post;

use Livewire\Component;
use Modules\Common\Services\Repositories\PostRepo;
use Livewire\WithPagination;
use Modules\Common\Models\Category;
use Modules\Common\Contracts\WithThirdParty;

class Listing extends Component
{
    use WithPagination, WithThirdParty;

    /**
     * Define string property
     * @var string|null
     */
    public $search;

    public $selectedRating;
    public $selectedDate; // Menambahkan properti selectedDate
    public $category;
    public $tag;
    public $sort = 'newest';

    /**
     * Define int property
     * @var int|null
     */
    public ?int $per_page = 8;

    /**
     * Define livewire query string
     * @var array
     */
    protected $queryString = [
        'search', 'category', 'tag', 'selectedDate' // Menambahkan selectedDate ke queryString
    ];

    /**
     * Hooks for all properties
     *
     * @param  string $component
     * @param  string $value
     * @return void
     */
    public function updated($component, $value)
    {
        if (!$this->search) {
            $this->reset('search');
        }

        $this->resetPage();
    }

    public function category($slug)
    {
        if (!$this->category) {
            $this->reset('category');
        }

        $this->category = $slug;
    }

    /**
     * Get all public posts
     * @return Paginator
     */
    public function getPopularPosts()
    {
        return (new PostRepo)->getPopularPosts(5);
    }

    /**
     * Get all public posts
     * @return Paginator
     */
    public function getAll()
    {
        return (new PostRepo)->getPublicPosts((object) [
            'search' => $this->search,
            'tag' => $this->tag,
            'date_start' => $this->selectedDate,
            'rating' => $this->selectedRating,
            'sort' => $this->sort,
        ], $this->per_page);
    }

    /**
     * Get all post categories
     * @return Category
     */
   

    /**
     * Hooks for apply filter
     * @return void
     */
    public function applyFilter()
    {
        if (!$this->search) {
            $this->reset('search');
        }

        $this->resetPage();
    }

    /**
     * Reset all filter property
     * @return void
     */
    public function resetFilter()
    {
        $this->reset(
            'search',
            'category',
            'sort',
            'selectedDate' // Menambahkan selectedDate ke reset
        );

        $this->dispatch('filter-reset', [
            'input[name="search"]' => $this->search,
            'select[name="category"]' => $this->category,
            'select[name="sort"]' => $this->sort,
        ]);
    }

    public function loadMore()
    {
        $this->per_page += 6; // Menambah jumlah per halaman
    }

    public function render()
    {
        return view('front::livewire.post.listing', [
            'datas' => self::getAll(),
        ]);
    }
}
