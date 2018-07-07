<?php

namespace Chernoff\Datatable;

/**
 * Class Row
 * @package Chernoff\Datatable
 */
class Row implements ArrayableInterface
{
    /** @var  array */
    protected $data;

    /** @var  string */
    protected $id;

    /** @var  string */
    protected $class;

    /** @var  array */
    protected $attributes = [];

    /**
     * NOTE! Following properties are not completely supported by datatables
     * version we're currently using. They will work only in case of in place
     * data rendering.
     */

    /** @var  array */
    protected $cellAttributes = [];

    /**
     * @param array $data
     * @param null $id
     * @param null $class
     */
    public function __construct(array $data = array(), $id = null, $class = null)
    {
        $this->data  = $data;
        $this->id    = $id;
        $this->class = $class;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return json_encode($this->toArray());
    }

    /**
     * @return array
     */
    public function toArray()
    {
        $values = $this->data;

        if (!empty($this->id)) {
            $values["DT_RowId"] = $this->id;
        }

        if (!empty($this->class)) {
            $values["DT_RowClass"] = $this->class;
        }

        if (!empty($this->attributes)) {
            $values["DT_RowAttr"] = $this->attributes;
        }

        return $values;
    }

    /**
     * @param $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param $class
     * @return $this
     */
    public function setClass($class)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * @return null|string
     */
    public function getClass()
    {
        return $this->class;
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
     * @param $key
     * @return mixed
     */
    public function getDataItem($key)
    {
        return (!empty($this->data[$key])) ? $this->data[$key] : null;
    }

    /**
     * @param $key
     * @param $value
     * @return $this
     */
    public function addData($key, $value)
    {
        $this->data[$key] = $value;

        return $this;
    }

    /**
     * @return array
     */
    public function getAttributes()
    {
        return array_merge($this->attributes, ["id" => $this->id, "class" => $this->class]);
    }

    /**
     * @param array $attributes
     * @return $this
     */
    public function setAttributes($attributes)
    {
        $this->attributes = $attributes;

        return $this;
    }

    /**
     * @param string $attribute
     * @param string $value
     * @return $this
     */
    public function addAttribute($attribute, $value)
    {
        $this->attributes[$attribute] = $value;

        return $this;
    }

    /**
     * @param string $cell
     * @return array
     */
    public function getCellAttributes($cell)
    {
        return (!empty($this->cellAttributes[$cell]))
            ? $this->cellAttributes[$cell]
            : [];
    }

    /**
     * @param string $cell
     * @param array $cellAttributes
     * @return $this
     */
    public function setCellAttributes($cell, $cellAttributes)
    {
        $this->cellAttributes[$cell] = $cellAttributes;

        return $this;
    }

    /**
     * @param string $cell
     * @param string $attribute
     * @param string $value
     * @return $this
     */
    public function addCellAttribute($cell, $attribute, $value)
    {
        $this->cellAttributes[$cell][$attribute] = $value;

        return $this;
    }
}
