<?php
    include "../static/classes/cart.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../static/css/cart.css">
    <title>Document</title>
</head>
<body>
        <?php
        if (isset($_GET['customer'])) {
            $object = new cart;
            $customer_id = $_GET['customer'];
            $object->view_cart($customer_id);
        } else {
            echo 'NO ITEMS ADDED TO CART';
        }

        if (isset($_GET['edit'])) {
            $customer_id = $_GET['customer'];
            $class = new cart;
            $class->fetch_edit_customer($customer_id);
            
        }
            
        ?>

</body>
</html>