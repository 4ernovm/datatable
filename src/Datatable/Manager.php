<?php

namespace Chernoff\Datatable;

/**
 * Class Manager
 * @package Chernoff\Datatable
 */
class Manager
{
    /** @var DatatableInterface */
    protected $datatable;

    /** @var  Column[] */
    protected $columns;

    /** @var  array */
    protected $settings;

    /** @var  array */
    protected $attributes;

    /** @var  string */
    protected $name;

    /** @var TemplatingInterface  */
    protected $templating;

    /** @var  array */
    protected static $renderedScripts = array();

    /** @var  int */
    protected $interactive;

    /** @var  int */
    protected $delay;

    /** @var  mixed */
    protected $data;

    /**
     * @param TemplatingInterface $templating
     */
    public function __construct(TemplatingInterface $templating)
    {
        $this->templating = $templating;
    }

    /**
     * @param DatatableInterface $datatable
     * @return $this
     */
    public function build(DatatableInterface $datatable)
    {
        $columns = array();

        /** @var Column $column */
        foreach ($datatable->getColumns() as $column) {
            $columns[$column->getName()] = $column;
        }

        $this->datatable   = $datatable;
        $this->columns     = $columns;
        $this->settings    = $datatable->getConfig();
        $this->attributes  = $datatable->getAttributes();
        $this->name        = $datatable->getName();
        $this->interactive = $datatable->getInteractive();
        $this->delay       = $datatable->getDelay();

        self::$renderedScripts[$datatable->getName()] = $this->js();

        return $this;
    }

    /**
     * @return string
     */
    public function render()
    {
        return $this->templating->html($this->buildTemplateParams());
    }

    /**
     * @return string
     */
    public function js()
    {
        return $this->templating->js($this->buildTemplateParams());
    }

    /**
     * @return array
     */
    protected function buildTemplateParams()
    {
        if (!$this->isBuilt()) {
            throw new \RuntimeException("Datatable hasn't been built yet");
        }

        $params = array(
            'columns'     => $this->columns,
            'options'     => $this->settings,
            'attributes'  => $this->attributes,
            'name'        => $this->name,
            'interactive' => $this->interactive,
            'delay'       => $this->delay,
        );

        // Assuming in place data rendering.
        if (empty($this->settings["bServerSide"])) {
            if (!isset($this->data[$this->name])) {
                $this->data[$this->name] = $this->getData($this->datatable)->getData();
            }

            $params["data"] = $this->data[$this->name];
        }

        return $params;
    }

    /**
     * @param DatatableInterface $datatable
     * @return Response
     */
    public function getData(DatatableInterface $datatable)
    {
        if (!$this->isBuilt()) {
            $this->build($datatable);
        }

        $request = new Request($this->columns);

        list ($data, $total, $totalDisplay) = $datatable->getData($request);

        $response = new Response($request->getIndex(), array(), $total, $totalDisplay);

        foreach ($data as $item) {
            $row = new Row;

            /** @var Column $column */
            foreach ($this->columns as $column) {
                $callback = $column->getData();
                $row->addData($column->getName(), $callback($item));
            }

            $datatable->rowProcess($row, $item);
            $response->addData($row);
        }

        return $response;
    }

    /**
     * @return bool
     */
    protected function isBuilt()
    {
        return (!empty($this->columns));
    }

    /**
     * Returns rendered JS parts for registered data tables
     *
     * @return string
     */
    public static function getJS()
    {
        return implode("\n", self::$renderedScripts);
    }
}
