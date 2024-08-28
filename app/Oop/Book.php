<?php

namespace App\Oop;

class Book extends CategoryBook implements IBook, IGenre
{
    protected $publisher = 'Andi';

    protected function genre()
    {
        return 'Genre Komedi';
    }

    public function read()
    {
        return 'Saya sedang membaca buku '.$this->getCategory().' dengan '. $this->genre();
    }

    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
    }

    public function readGenre()
    {
        return $this->genre();
    }

    protected function totalPages()
    {
        return '120 pages';
    }
}
