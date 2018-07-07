<?php

namespace Chernoff\Datatable\Defaults;

use Chernoff\Datatable\Configuration as Base;

/**
 * Class Configuration
 * @package Chernoff\Datatable\Defaults
 */
class Configuration extends Base
{
    /**
     * Configuration constructor.
     */
    public function __construct()
    {
        $this->pagingType =  "full_numbers";
        $this->processing = true;
        $this->serverSide = false;
        $this->destroy = true;
        $this->stateSave = true;
        $this->searching = true;
        $this->ordering = true;
    }
}
