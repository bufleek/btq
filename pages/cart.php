<?php 
    include "../static/classes/cart.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
        <?php
        if(isset($_GET['customer'])){
            echo '
        <script type="text/javascript">alert("ADDED SUCCESSFULLY YOU HAVE BEEN REDIRECTED TO CHECKOUT")</script>
    ';
            $customer_id = $_GET['customer'];
            $object = new cart;
            $object->view_cart($customer_id);
            
            echo '
                <form action="cart.php?purchase='.$customer_id.' method="POST">
                    <h4>Please feed us with your contact information below so that we can reach you</h4>
                        <label>NAME</label>
                    <input type="text" name="customer_name" required>
                        <label>EMAIL</label>
                    <input type="mail" name="customer_email">
                        <label>PHONE</label>
                    <input type="text" name="customer_phone">
                        <button type="submit" name="purchase">SUBMIT ORDER</button>
                </form>
            ';
        }elseif (isset($_POST['purchase']) && isset($_GET['purchase'])) {
            echo "your item will be processed";
        }
        else {
            echo 'NO ITEMS ADDED TO CART';
        }
            
        ?>
</body>
</html>