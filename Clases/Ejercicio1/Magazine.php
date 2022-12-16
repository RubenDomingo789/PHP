<?php
class Magazine extends ReadingMaterial
{
    private $additionalResources;

    function __construct($additionalResources, $title, $pages, $price)
    {
        $this->additionalResources = $additionalResources;
        parent::__construct($title, $pages, $price);
    }

    function get_additionalResources()
    {
        return $this->additionalResources;
    }

    function set_additionalResources($additionalResources)
    {
        $this->additionalResources = $additionalResources;
    }

}
?>