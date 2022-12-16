<?php
class Publisher 
{
    private static $id = 0;
    private $name;
    private $adress;
    private $telephone;
    private $website;

    function __construct($name, $adress, $telephone, $website) 
    {
        self::$id++;
        $this->name = $name;
        $this->adress = $adress;
        $this->telephone = $telephone;
        $this->website = $website;
    }

    function get_id()
    {
        return $this->id;
    }

    function set_id($id)
    {
        $this->id = $id;
    }

    function get_name()
    {
        return $this->name;
    }

    function set_name($name)
    {
        $this->name = $name;
    }

    function get_adress()
    {
        return $this->adress;
    }

    function set_adress($adress)
    {
        $this->adress = $adress;
    }

    function get_telephone()
    {
        return $this->telephone;
    }

    function set_telephone($telephone)
    {
        $this->telephone = $telephone;
    }

    function get_website()
    {
        return $this->website;
    }

    function set_website($website)
    {
        $this->website = $website;
    }

}
?>