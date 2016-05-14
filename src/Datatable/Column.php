<?php

namespace Chernoff\Datatable;

/**
 * Class Column
 * @package Chernoff\Datatable
 */
class Column
{
    /** @var string  */
    protected $name;

    /** @var  \Closure */
    protected $data;

    /** @var  string */
    protected $label;

    /** @var  string */
    protected $sortBy;

    /** @var  array */
    protected $options;

    /** @var  array */
    protected $attributes;

    /**
     * @param string $name
     * @param \Closure $data
     * @param string $label
     * @param string $sortBy
     * @param array $attributes
     * @param array $options
     */
    public function __construct($name, $data = null, $label = null, $sortBy = null, array $attributes = array(), array $options = array())
    {
        $this->name       = $name;
        $this->data       = $data;
        $this->label      = $label;
        $this->options    = $options;
        $this->attributes = $attributes;
        $this->sortBy     = $sortBy;
    }

    /**
     * @param $data
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return callable|null|string
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param $label
     * @return $this
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * @return callable|null|string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @return string
     */
    public function getSortBy()
    {
        return $this->sortBy;
    }

    /**
     * @param string  $sortBy
     * @return $this
     */
    public function setSortBy($sortBy)
    {
        $this->sortBy = $sortBy;

        return $this;
    }

    /**
     * @param array $options
     * @return $this
     */
    public function setOptions(array $options)
    {
        $this->options = $options;

        return $this;
    }

    /**
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * @param $key
     * @param $value
     * @return $this
     */
    public function addOption($key, $value)
    {
        $this->options[$key] = $value;

        return $this;
    }

    /**
     * @param $key
     * @return null
     */
    public function getOption($key)
    {
        return (!empty($this->options[$key])) ? $this->options[$key] : null;
    }

    /**
     * @param array $attributes
     * @return $this
     */
    public function setAttributes(array $attributes)
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param $key
     * @param $value
     * @return $this
     */
    public function addAttribute($key, $value)
    {
        $this->attributes[$key] = $value;

        return $this;
    }

    /**
     * @param $key
     * @return null
     */
    public function getAttribute($key)
    {
        return (!empty($this->attributes[$key])) ? $this->attributes[$key] : null;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}
