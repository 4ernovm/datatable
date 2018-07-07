<?php

namespace Chernoff\Datatable;

/**
 * Class Request10
 * @package Chernoff\Datatable
 */
class Request10 extends Request
{
    /** @var  array */
    protected $search;

    /**
     * Request params without indexes
     *
     * @var array
     */
    protected $nonIndexableParams = array(
        '_' => 'requestTime',
        'draw' => 'index',
        'start' => 'offset',
        'length' => 'limit',
        'search' => 'search',
    );

    protected $indexableParams = array(
        'data' => 'data',
        'name' => 'name',
        'search' => 'search',
        'searchable' => 'isSearchable',
        'orderable' => 'isSortable',
    );

    /**
     * @param Column[] $columns
     */
    public function __construct(array $columns)
    {
        if (!isset($_GET['columns']) && !isset($_GET['draw']) && empty($_GET['start']) && empty($_GET['length'])) {
            throw new \LogicException("You're using legacy version of Datatables. Consider upgrade");
        }

        foreach ($this->nonIndexableParams as $get => $inner) {
            $this->{$inner} = (isset($_GET[$get])) ? $_GET[$get] : null;
        }

        foreach ($_GET['columns'] as $i => $col) {
            foreach ($this->indexableParams as $get => $inner) {
                $this->columns[$i][$inner] = (isset($col[$get])) ? $col[$get] : null;

                if (("data" == $inner) && isset($col[$get])) {
                    $this->columns[$i]["sortBy"] = $columns[$col[$get]]->getSortBy();
                }
            }
        }

        foreach ($_GET['order'] as $col) {
            $i = $col['column'];
            $this->columns[$i]['sortDirection'] = $col['dir'];
            $this->sort[] = [$this->columns[$i]['sortBy'], $col['dir']];
        }
    }

    /**
     * @return string
     */
    public function getQ()
    {
        return $this->search['value'];
    }

    /**
     * @return bool
     */
    public function getIsRegex()
    {
        return $this->search['regex'];
    }
}
