<?php

namespace Chernoff\Datatable\Defaults;

/**
 * Class AjaxConfiguration
 * @package Chernoff\Datatable\Defaults
 */
class AjaxConfiguration extends Configuration
{
    /**
     * AjaxConfiguration constructor.
     * @param $url
     */
    public function __construct($url)
    {
        parent::__construct();
        $this->ajax = compact('url');
        $this->processing = true;
        $this->serverSide = true;
    }
}
