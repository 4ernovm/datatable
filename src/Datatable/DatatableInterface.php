<?php

namespace Chernoff\Datatable;

/**
 * Interface DatatableInterface
 * @package Chernoff\Datatable
 */
interface DatatableInterface
{
    /**
     * Return unique name for datatable
     *
     * @return string
     */
    public function getName();

    /**
     * Returns interval between data updates in milliseconds. If set to 0 or
     * null will be treated as not interactive.
     *
     * @return int|null
     */
    public function getInteractive();

    /**
     * Returns delay for filtering requests. Set to 0 or null to disable.
     *
     * @return int|null
     */
    public function getDelay();

    /**
     * Returns list of columns
     *
     * @return Column[]
     */
    public function getColumns();

    /**
     * Returns list of settings to apply in JS config
     *
     * @return array
     */
    public function getConfig();

    /**
     * Return list of attributes to apply to head and bottom
     *
     * @return array
     */
    public function getAttributes();

    /**
     * Should return an array of following structure:
     *    0 => array # an array of results found
     *    1 => int   # total records, before filtering (i.e. the total number of records in the database)
     *    2 => int   # Total records, after filtering (i.e. the total number of records after filtering
     *                 has been applied - not just the number of records being returned in this result set)
     *
     * @param Request $request
     * @return array
     */
    public function getData(Request $request);

    /**
     * Post processing of formed row.
     *
     * @param Row $row
     * @param $data
     * @return Row
     */
    public function rowProcess(Row $row, $data);
}
