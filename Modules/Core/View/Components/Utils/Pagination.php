<?php

namespace Modules\Core\View\Components\Utils;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Pagination extends Component
{
    public $table;
    public $currentPage;
    public $lastPage;
    public $perPage;
    public $total;
    public $startTotal;
    public $withPerPage;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($table, $withPerPage = true)
    {
        $this->table = $table;
        $currentPage = $table->currentPage();
        $lastPage = $table->lastPage();
        $per_page = $table->perPage();

        // Count total
        $total = $currentPage != $lastPage ?
            ($currentPage * $perPage) : (($currentPage - 1) * $perPage) + $table->count();

        $startCount = $total - $perPage !== 0 ?: 1;

        $startTotal = $currentPage != $lastPage ? $startCount : ($table->total() - $table->count()) + 1;

        $this->currentPage = $currentPage;
        $this->lastPage = $lastPage;
        $this->per_page = $perPage;
        $this->total = $total;
        $this->startTotal = $startTotal;
        $this->withPerPage = $withPerPage;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View | Closure | string
    {
        return view('common::components.utils.pagination', [
            'withPerPage' => true,
        ]);
    }
}
