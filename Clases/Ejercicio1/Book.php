<?php
class Book extends ReadingMaterial
{
    private $chapters;
    private $authors;

    function __construct($chapters, $authors, $title, $pages, $price)
    {
        $this->chapters = $chapters;
        $this->authors = $authors;
        parent::__construct($title, $pages, $price);
    }

    function get_chapters()
    {
        return $this->chapters;
    }

    function set_chapters($chapters)
    {
        $this->chapters = $chapters;
    }

    function get_authors()
    {
        return $this->authors;
    }

    function set_authors($authors)
    {
        $this->authors = $authors;
    }
}
?>