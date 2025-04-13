<?php

namespace Modules\Common\Utils;

use Modules\Common\Utils\CustomTable\Column;

class CustomTable
{
    /**
     * Define table columns for table component
     * @var array|null
     */
    public ?array $columns;

    /**
     * Define table per-page for table component
     * @var array|null
     */
    public ?array $listPerPage = [5, 10, 25, 50, 100, 250, 500, 1000];

    /**
     * Define default sortable column
     * @var array|null
     */
    public ?string $sort = 'name';

    /**
     * Define default sortable order columnn
     * @var array|null
     */
    public ?string $order = 'asc';

    /**
     * Generate table header
     *
     * @param  array|null $columns
     * @return array
     */
    public function columns(?array $columns)
    {
        return $this->columns = array_map(function ($column) {
            $customColumn = new Column;
            return $customColumn->name($column)
                ->label($column)
                ->description($column)
                ->sortable($column)
                ->show($column);
        }, $columns);
    }

    public function render()
    {
        return view('common::components.table.table', [
            'head' => $this->columns,
            'sort' => $this->sort,
            'order' => $this->order,
        ]);
    }
}
