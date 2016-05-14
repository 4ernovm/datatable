<?php

namespace Chernoff\Datatable;

/**
 * Interface TemplatingInterface
 * @package Chernoff\Datatable
 */
interface TemplatingInterface
{
    /**
     * @param array $params
     * @return string
     */
    public function html(array $params);

    /**
     * @param array $params
     * @return string
     */
    public function js(array $params);
}
