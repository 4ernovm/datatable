<?php

namespace Chernoff\Datatable;

/**
 * Class Request
 * @package Chernoff\Datatable
 */
class Request
{
    /** @var array  */
    protected $columns;

    /** @var  string */
    protected $index;

    /** @var  int */
    protected $columnsCount;

    /** @var  int */
    protected $offset;

    /** @var  int */
    protected $limit;

    /** @var  string */
    protected $q;

    /** @var  bool */
    protected $isRegex;

    /** @var  int */
    protected $numberOfSortingColumns;

    /** @var  int */
    protected $requestTime;

    /** @var  array */
    protected $sort;

    /**
     * Request params without indexes
     *
     * @var array
     */
    protected $nonIndexableParams = array(
        'sEcho'          => 'index',
        'iColumns'       => 'columnsCount',
        'iDisplayStart'  => 'offset',
        'iDisplayLength' => 'limit',
        'sSearch'        => 'q',
        'bRegex'         => 'isRegex',
        'iSortingCols'   => 'numberOfSortingColumns',
        '_'              => 'requestTime',
    );

    protected $indexableParams = array(
        'mDataProp'   => 'data',
        'sSearch'     => 'q',
        'bRegex'      => 'isRegex',
        'bSearchable' => 'isSearchable',
        'bSortable'   => 'isSortable',
    );

    /**
     * @param Column[] $columns
     */
    public function __construct(array $columns)
    {
        foreach ($this->nonIndexableParams as $get => $inner) {
            $this->{$inner} = (isset($_GET[$get])) ? $_GET[$get] : null;
        }

        foreach ($this->indexableParams as $get => $inner) {
            for ($i = 0; $i < $this->columnsCount; $i++) {
                $this->columns[$i][$inner] = (isset($_GET["{$get}_{$i}"])) ? $_GET["{$get}_{$i}"] : null;

                if (("data" == $inner) && isset($_GET["{$get}_{$i}"])) {
                    $this->columns[$i]["sortBy"] = $columns[$_GET["{$get}_{$i}"]]->getSortBy();
                }
            }
        }

        for ($i = 0; $i < $this->numberOfSortingColumns; $i++) {
            $this->columns[$_GET["iSortCol_{$i}"]]['sortDirection'] = (isset($_GET["sSortDir_{$i}"])) ? $_GET["sSortDir_{$i}"] : null;

            if (!empty($this->columns[$_GET["iSortCol_{$i}"]]['sortBy'])) {
                $this->sort[] = [$this->columns[$_GET["iSortCol_{$i}"]]["sortBy"], $this->columns[$_GET["iSortCol_{$i}"]]['sortDirection']];
            }
        }
    }

    /**
     * @return array
     */
    public function getColumns()
    {
        return $this->columns;
    }

    /**
     * @return string
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * @return int
     */
    public function getColumnsCount()
    {
        return $this->columnsCount;
    }

    /**
     * @return int
     */
    public function getOffset()
    {
        return $this->offset;
    }

    /**
     * @return int
     */
    public function getLimit()
    {
        return $this->limit;
    }

    /**
     * @return array
     */
    public function getOrderBy()
    {
        return $this->sort;
    }

    /**
     * @return array
     */
    public function getSearchFields()
    {
        $fields = [];

        foreach ($this->columns as $column) {
            if ("true" == $column["isSearchable"] && !empty($column["sortBy"])) {
                $fields[] = $column["sortBy"];
            }
        }

        return $fields;
    }

    /**
     * @return string
     */
    public function getQ()
    {
        return $this->q;
    }

    /**
     * @return bool
     */
    public function getIsRegex()
    {
        return $this->isRegex;
    }

    /**
     * @return int
     */
    public function getRequestTime()
    {
        return $this->requestTime;
    }
}
