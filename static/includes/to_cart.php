<?php
if (isset($_POST['to_cart'])) {
    require "../classes/cart.php";

    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $customer_number = $_POST['customer_number'];
    $item_id = $_POST['item_id'];

    $cart = new cart;
    $cart->to_cart($customer_name, $customer_email, $customer_number, $item_id);
} elseif (isset($_POST['edit'])) {
    require "../classes/cart.php";
    $customer_id = $_GET['customer'];

    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $customer_phone = $_POST['customer_phone'];

    $object = new cart;
    $object->edit_cart($customer_id, $customer_name, $customer_email, $customer_phone);
} else {
    echo "restricted";
}
