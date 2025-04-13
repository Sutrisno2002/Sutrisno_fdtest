<?php

namespace Modules\Common\Contracts;

trait WithTable
{
    /**
     * Livewire event listener for Table Component
     * @var  TABLE_SORT_ORDER
     */
    const TABLE_SORT_ORDER = 'sortOrder';

    /**
     * Livewire event listener for Table Component
     * @var  TABLE_SORT_ORDER
     */
    const CHANGE_PERPAGE = 'changePerPage';

    /**
     * Hooks for sort & order property
     * When table head was triggered, this method will be run
     *
     * @param  string $sort
     * @return void
     */
    public function sortOrder($sort)
    {
        $this->resetPage();
        $this->sort = $sort;

        if ($this->order == 'asc') {
            $this->order = 'desc';
        } elseif ($this->order == 'desc') {
            $this->order = 'asc';
        } else {
            $this->sort = 'created_at';
            $this->order = 'desc';
        }
    }

    /**
     * Hooks for perpage property
     * When perpage was triggered, this method will be run
     *
     * @param  int $perPage
     * @return void
     */
    public function changePerPage($perPage)
    {
        $this->per_page = $perPage;
    }
}
