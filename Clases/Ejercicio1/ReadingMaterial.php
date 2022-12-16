<?php

include "Publisher.php";

abstract class ReadingMaterial
{
    private static $id = 0;
    private $title;
    private $pages;
    private $price;
    private $editor;

    function __construct($title, $pages, $price)
    {
        self::$id++;
        $this->title = $title;
        $this->pages = $pages;
        $this->price = $price;
        $this->editor = new Publisher("Akal", "Sector Foresta, 1, 28760 Tres Cantos, Madrid", 918061996, "https://www.akal.com/");

    }

    function get_id()
    {
        return $this->id;
    }

    function set_id($id)
    {
        $this->id = $id;
    }

    function get_title()
    {
        return $this->title;
    }

    function set_title($title)
    {
        $this->title = $title;
    }

    function get_pages()
    {
        return $this->pages;
    }

    function set_pages($pages)
    {
        $this->pages = $pages;
    }

    function get_price()
    {
        return $this->price;
    }

    function set_price($pri)
    {
        $this->price = $pri;
    }

    function get_editor()
    {
        return $this->editor;
    }

    function set_editor($editor)
    {
        $this->editor = $editor;
    }
}

?>