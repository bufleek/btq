<?php
include "../classes/cloth.php";
include "../classes/cart.php";

if(isset($_GET['id'])){
    
    $cart = new cart;
    $cart->add_to_cart();
}
if (isset($_GET['added']) && isset($_GET['customer'])) {
    $customer_id = $_GET['customer'];
    header("location: ../../pages/cart.php?customer=$customer_id");
}
