<?php

namespace Chernoff\Templating\Datatable;

use Chernoff\Datatable\TemplatingInterface;

/**
 * Class Templating
 * @package Chernoff\Templating\Datatable
 */
class Templating implements TemplatingInterface
{
    /**
     * @param string $template
     * @param array $params
     * @return string
     */
    public function render($template, array $params)
    {
        require_once 'helper.php';

        ob_start();
        extract($params);

        require $template;

        return ob_get_clean();
    }

    /**
     * @param array $params
     * @return string
     */
    public function html(array $params)
    {
        return $this->render("Views/html.php", $params);
    }

    /**
     * @param array $params
     * @return string
     */
    public function js(array $params)
    {
        return $this->render("Views/js.php", $params);
    }
}
