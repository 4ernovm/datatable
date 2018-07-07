<?php

namespace Chernoff\Datatable;

use Chernoff\Datatable\Defaults\Attributes;
use Chernoff\Datatable\Defaults\Configuration;

/**
 * Class AbstractDatatable
 *
 * Provides default options for datatables
 *
 * @package Chernoff\Datatable
 */
abstract class AbstractDatatable implements DatatableInterface
{
    /** @var int Delay between table updates in milliseconds */
    protected $interactive = null;

    /** @var int Delay between search requests in milliseconds */
    protected $delay = null;

    /**
     * {@inheritdoc}
     */
    public function getInteractive()
    {
        return $this->interactive;
    }

    /**
     * {@inheritdoc}
     */
    public function getDelay()
    {
        return $this->delay;
    }

    /**
     * {@inheritdoc}
     */
    public function getAttributes()
    {
        return new Attributes();
    }

    /**
     * {@inheritdoc}
     */
    public function getConfig()
    {
        return new Configuration();
    }

    /**
     * {@inheritdoc}
     */
    public function rowProcess(Row $row, $data)
    {
        return $row;
    }

    /**
     * @param $ids
     * @return callable
     */
    protected function getSortCallback($ids)
    {
        return function ($a, $b) use ($ids) {
            $indexA = array_search($a->getKey(), $ids);
            $indexB = array_search($b->getKey(), $ids);

            if ($indexA == $indexB) {
                return 0;
            }

            return ($indexA > $indexB) ? 1 : -1;
        };
    }

    /**
     * @param Request $request
     * @return array
     */
    protected function extract(Request $request)
    {
        return [
            $request->getQ(),
            $request->getOrderBy(),
            $request->getLimit(),
            $request->getOffset()
        ];
    }
}
