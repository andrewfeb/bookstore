<?php

namespace App\Oop;

abstract class CategoryBook
{
    private $categoryName = '';

    protected $publisher = 'Elex Media';

    public function __construct($category)
    {
        $this->categoryName = $category;
    }

    public function getCategory()
    {
        return $this->categoryName;
    }

    public function setCategory($value)
    {
        $this->categoryName = $value;
    }

    protected function genre()
    {
        return 'Genre Horror';
    }

    abstract protected function totalPages();
}
