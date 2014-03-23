<?php
// src/ProductOrder.php
class ProductOrder
{

    //protected variables
    protected $id;
    protected $quantity;
    protected $orderDate;
    protected $lastUpdate = null;
    protected $productOrdered;
    protected $purchaser;


    //getters and setters
    public function getId()
    {
        return $this->id;
    }

    //no setter for $id

    public function getQuantity()
    {
        return $this->quantity;
    }

    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    public function getOrderDate()
    {
        return $this->orderDate;
    }

    public function setOrderDate($orderDate)
    {
        $this->orderDate = $orderDate;
    }

    public function getLastUpdate()
    {
        return $this->lastUpdate;
    }

    public function setLastUpdate($lastUpdate)
    {
        $this->lastUpdate = $lastUpdate;
    }

    //manyToOne relationships
    public function getProductOrdered()
    {
        return $this->productOrdered;
    }

    public function setProductOrdered($productOrdered)
    {
        $productOrdered->placeOrder($this);
        $this->productOrdered = $productOrdered;
    }

    public function getPurchaser()
    {
        return $this->purchaser;
    }

    public function setPurchaser($purchaser)
    {
        $purchaser->purchaseItem($this);
        $this->purchaser = $purchaser;
    }

}
?>