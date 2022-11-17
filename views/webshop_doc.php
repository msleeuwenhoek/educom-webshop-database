<?php
require_once "basic_doc.php";

class WebshopDoc extends BasicDoc
{
    protected function showTabTitle()
    {
        echo "Webshop";
    }
    protected function showHeader()
    {
        echo
        "<h1>This is the webshop</h1>";
    }
    protected function showContent()
    {
        echo '<div class="products">';
        foreach ($this->model->products as $product) {
            echo
            '<div class="product-container">
                <div class="product-visuals">
                    <img src="./images/' . $product['img_file'] . '" alt="' . $product['product_name'] . '">
                    <div class="price">€' . $product['price'] . '</div>
                </div>
                <div class="product-info">
                    <h3>' . $product['product_name'] . '</h3>
                    <p>' . $product['description'] . '</p>
                    <button >View</button>
                </div>
            </div>';


            $product['description'];
        }

        echo '</div>';
    }
}
