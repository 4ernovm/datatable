<?php

namespace Chernoff\Datatable;

/**
 * Class Attributes
 *
 * @TODO To be extended with other attributes
 * @package Chernoff\Datatable
 */
class Attributes implements ArrayableInterface
{
    use ToArrayTrait;

    /**
     * @var string
     */
    protected $class;

    /**
     * @var string
     */
    protected $width;

    /**
     * @var string
     */
    protected $cellpadding;

    /**
     * @var string
     */
    protected $cellspacing;

    /**
     * @var string
     */
    protected $border;

    /**
     * @return string
     */
    public function getClass(): ?string
    {
        return $this->class;
    }

    /**
     * @param string $class
     * @return Attributes
     */
    public function setClass(string $class): self
    {
        $this->class = $class;
        return $this;
    }

    /**
     * @return string
     */
    public function getWidth(): ?string
    {
        return $this->width;
    }

    /**
     * @param string $width
     * @return Attributes
     */
    public function setWidth(string $width): self
    {
        $this->width = $width;
        return $this;
    }

    /**
     * @return string
     */
    public function getCellpadding(): ?string
    {
        return $this->cellpadding;
    }

    /**
     * @param string $cellpadding
     * @return Attributes
     */
    public function setCellpadding(string $cellpadding): self
    {
        $this->cellpadding = $cellpadding;
        return $this;
    }

    /**
     * @return string
     */
    public function getCellspacing(): ?string
    {
        return $this->cellspacing;
    }

    /**
     * @param string $cellspacing
     * @return Attributes
     */
    public function setCellspacing(string $cellspacing): self
    {
        $this->cellspacing = $cellspacing;
        return $this;
    }

    /**
     * @return string
     */
    public function getBorder(): ?string
    {
        return $this->border;
    }

    /**
     * @param string $border
     * @return Attributes
     */
    public function setBorder(string $border): self
    {
        $this->border = $border;
        return $this;
    }
}
