<?php

namespace Chernoff\Datatable;

/**
 * Class Response
 * @package Chernoff\Datatable
 */
class Response
{
    /** @var string */
    protected $echo;

    /** @var array */
    protected $data;

    /** @var integer */
    protected $total;

    /** @var null integer */
    protected $totalDisplay;

    /**
     * @param $echo
     * @param array $data
     * @param null $total
     * @param null $totalDisplay
     */
    public function __construct($echo, array $data = array(), $total = null, $totalDisplay = null)
    {
        $this->echo         = $echo;
        $this->data         = $data;
        $this->total        = $total;
        $this->totalDisplay = $totalDisplay;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return json_encode([
            "sEcho"                => $this->echo,
            "iTotalRecords"        => $this->total,
            "iTotalDisplayRecords" => $this->totalDisplay,
            // @TODO Fix this
            "aaData"               => array_map(function ($item) { return $item->toArray(); }, $this->data),
        ]);
    }

    /**
     * @param array $data
     * @return $this
     */
    public function setData(array $data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param $value
     * @return $this
     */
    public function addData($value)
    {
        $this->data[] = $value;

        return $this;
    }

    /**
     * @param int $total
     * @return $this
     */
    public function setTotal($total)
    {
        $this->total = (int) $total;

        return $this;
    }

    /**
     * @return int
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param int $totalDisplay
     * @return $this
     */
    public function setTotalDisplay($totalDisplay)
    {
        $this->totalDisplay = (int) $totalDisplay;

        return $this;
    }

    /**
     * @return array
     */
    public function getTotalDisplay()
    {
        return $this->totalDisplay;
    }
}
