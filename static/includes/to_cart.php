<?php
if (isset($_POST['to_cart'])) {
    require "../classes/cart.php";

    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $customer_number = $_POST['customer_number'];
    $item_id = $_POST['item_id'];

    $cart = new cart;
    $cart->to_cart($customer_name, $customer_email, $customer_number, $item_id);
}elseif(isset($_POST['edit_customer']) && isset($_GET['customer'])) {
    require "../classes/cart.php";

                $customer_name = $_POST['customer_name'];
                $customer_email = $_POST['customer_email'];
                $customer_phone = $_POST['customer_phone'];
                $customer_id = $_GET['customer'];


    $object = new cart;
    $object->edit_customer_info($customer_name, $customer_id, $customer_email, $customer_phone);

}elseif(isset($_GET['confirm']) && isset($_GET['customer'])){
    require "../classes/order.php";

    $customer_id = $_GET['customer'];

    $object = new order;
    $object->confirm_order($customer_id);
}else {
    echo "restricted";
}
