<?php

namespace Chernoff\Datatable\Defaults;

use Chernoff\Datatable\Attributes as Base;

/**
 * Class Attributes
 * @package Chernoff\Datatable\Defaults
 */
class Attributes extends Base
{
    /**
     * Attributes constructor.
     */
    public function __construct()
    {
        $this->class = "responsive display table table-bordered focus-table";
        $this->width = "100%";
        $this->cellpadding = "0";
        $this->cellspacing = "0";
        $this->border = "0";
    }
}
