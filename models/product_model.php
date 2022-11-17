<?php

require_once 'page_model.php';

class ProductModel extends PageModel
{
    public $products = array();

    public function __construct($productCrud)
    {
        $this->productCrud = $productCrud;
    }


    public function showProducts()
    {
        $this->products =  $this->productCrud->retrieveProducts();
    }
}
