<?php
// src/Product.php
class Product
{

    //protected variables
    protected $id;
    protected $name;
    protected $description = null;
    protected $width = null;
    protected $length = null;
    protected $height = null;
    protected $weight = null;
    protected $dollarValue;
    protected $lastUpdate = null;

    //getters and setters
    public function getId()
    {
        return $this->id;
    }

    //no setter for $id

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getWidth()
    {
        return $this->width;
    }

    public function setWidth($width)
    {
        $this->width = $width;
    }

    public function getLength()
    {
        return $this->length;
    }

    public function setLength($length)
    {
        $this->length = $length;
    }

    public function getHeight()
    {
        return $this->height;
    }

    public function setHeight($height)
    {
        $this->height = $height;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    public function getDollarValue()
    {
        return $this->dollarValue;
    }

    public function setDollarValue($dollarValue)
    {
        $this->dollarValue = $dollarValue;
    }

    public function getLastUpdate()
    {
        return $this->lastUpdate;
    }

    public function setLastUpdate($lastUpdate)
    {
        $this->lastUpdate = $lastUpdate;
    }

}
?>