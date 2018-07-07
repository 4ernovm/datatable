<?php

namespace Chernoff\Datatable;

/**
 * Class Configuration
 * @package Chernoff\Datatable
 */
class Configuration implements ArrayableInterface
{
    use ToArrayTrait;

    /**
     * @var string
     */
    protected $pagingType;

    /**
     * @var boolean
     */
    protected $processing;

    /**
     * @var boolean
     */
    protected $serverSide;

    /**
     * @var boolean
     */
    protected $destroy;

    /**
     * @var boolean
     */
    protected $stateSave;

    /**
     * @var array
     */
    protected $ajax;

    /**
     * @var array
     */
    protected $lengthMenu;

    /**
     * @var integer
     */
    protected $pageLength;

    /**
     * @var boolean
     */
    protected $searching;

    /**
     * @var boolean
     */
    protected $ordering;

    /**
     * @var string
     */
    protected $dom;

    /**
     * @return string
     */
    public function getPagingType(): ?string
    {
        return $this->pagingType;
    }

    /**
     * @param string $pagingType
     * @return Configuration
     */
    public function setPagingType(string $pagingType): Configuration
    {
        $this->pagingType = $pagingType;
        return $this;
    }

    /**
     * @return bool
     */
    public function getProcessing(): ?bool
    {
        return $this->processing;
    }

    /**
     * @param bool $processing
     * @return Configuration
     */
    public function setProcessing(bool $processing): Configuration
    {
        $this->processing = $processing;
        return $this;
    }

    /**
     * @return bool
     */
    public function getServerSide(): ?bool
    {
        return $this->serverSide;
    }

    /**
     * @param bool $serverSide
     * @return Configuration
     */
    public function setServerSide(bool $serverSide): Configuration
    {
        $this->serverSide = $serverSide;
        return $this;
    }

    /**
     * @return bool
     */
    public function getDestroy(): ?bool
    {
        return $this->destroy;
    }

    /**
     * @param bool $destroy
     * @return Configuration
     */
    public function setDestroy(bool $destroy): Configuration
    {
        $this->destroy = $destroy;
        return $this;
    }

    /**
     * @return bool
     */
    public function getStateSave(): ?bool
    {
        return $this->stateSave;
    }

    /**
     * @param bool $stateSave
     * @return Configuration
     */
    public function setStateSave(bool $stateSave): Configuration
    {
        $this->stateSave = $stateSave;
        return $this;
    }

    /**
     * @return array
     */
    public function getAjax(): ?array
    {
        return $this->ajax;
    }

    /**
     * @param array $ajax
     * @return Configuration
     */
    public function setAjax(array $ajax): Configuration
    {
        $this->ajax = $ajax;
        return $this;
    }

    /**
     * @return array
     */
    public function getLengthMenu(): ?array
    {
        return $this->lengthMenu;
    }

    /**
     * @param array $lengthMenu
     * @return Configuration
     */
    public function setLengthMenu(array $lengthMenu): Configuration
    {
        $this->lengthMenu = $lengthMenu;
        return $this;
    }

    /**
     * @return int
     */
    public function getPageLength(): ?int
    {
        return $this->pageLength;
    }

    /**
     * @param int $pageLength
     * @return Configuration
     */
    public function setPageLength(int $pageLength): Configuration
    {
        $this->pageLength = $pageLength;
        return $this;
    }

    /**
     * @return bool
     */
    public function getSearching(): ?bool
    {
        return $this->searching;
    }

    /**
     * @param bool $searching
     * @return Configuration
     */
    public function setSearching(bool $searching): Configuration
    {
        $this->searching = $searching;
        return $this;
    }

    /**
     * @return bool
     */
    public function getOrdering(): ?bool
    {
        return $this->ordering;
    }

    /**
     * @param bool $ordering
     * @return Configuration
     */
    public function setOrdering(bool $ordering): Configuration
    {
        $this->ordering = $ordering;
        return $this;
    }

    /**
     * @return string
     */
    public function getDom(): ?string
    {
        return $this->dom;
    }

    /**
     * @param string $dom
     * @return Configuration
     */
    public function setDom(string $dom): Configuration
    {
        $this->dom = $dom;
        return $this;
    }
}
