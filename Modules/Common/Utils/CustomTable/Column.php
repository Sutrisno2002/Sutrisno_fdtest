<?php

namespace Modules\Common\Utils\CustomTable;

class Column
{
    /**
     * Define table column name
     * Usually used to sort columns by
     * Asc or desc of columns in a database
     *
     * @var string
     */
    public ?string $name = 'column';

    /**
     * Define table column label
     * Provides an alias for the column
     * Name rendered in the table component
     *
     * @var string|null
     */
    public ?string $label = 'label';

    /**
     * Define table column description
     * Provide a clue to the user to explain
     * The contents of the column
     *
     * @var string|null
     */
    public ?string $description = '';

    /**
     * Define table column sortable
     * Users can sort based on the selected column
     *
     * @var boolean|null
     */
    public ?bool $sortable = false;

    /**
     * Define table show/hide column
     * Users show/hide sort based on the selected column
     *
     * @var boolean|null
     */
    public ?bool $show = true;

    /**
     * Ensure that the configuration
     * In the column is available and
     * If not, add new properties
     *
     * @param array|null $array
     * @param string|null $needle
     * @return void
     */
    public function checkConfig(?array $array, ?string $needle)
    {
        return isset($array[$needle]) ? $array[$needle] : $this->$needle;
    }

    /**
     * Set name property with given config
     *
     * @param array|null $column
     * @return self
     */
    public function name(?array $column)
    {
        $this->name = self::checkConfig($column, 'name');
        return $this;
    }

    /**
     * Set label property with given config
     *
     * @param array|null $column
     * @return self
     */
    public function label(?array $column)
    {
        $this->label = self::checkConfig($column, 'label');
        return $this;
    }

    /**
     * Set description property with given config
     *
     * @param array|null $column
     * @return self
     */
    public function description(?array $column)
    {
        $this->description = self::checkConfig($column, 'description');
        return $this;
    }

    /**
     * Set sortable property with given config
     *
     * @param array|null $column
     * @return self
     */
    public function sortable(?array $column)
    {
        $this->sortable = self::checkConfig($column, 'sortable');
        return $this;
    }

    /**
     * Set show property with given config
     *
     * @param array|null $column
     * @return self
     */
    public function show(?array $column)
    {
        $this->show = self::checkConfig($column, 'show');
        return $this;
    }

    /**
     * Generate a column table
     * @return array
     */
    public function make()
    {
        return [
            'name' => $this->name,
            'label' => $this->label,
            'description' => $this->description,
            'sortable' => $this->sortable,
            'show' => $this->show,
        ];
    }

    public function renderColumn()
    {
        return view('common::components.table.th', [
            'column' => self::make(),
        ]);
    }
}
