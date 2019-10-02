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
            $object->view_cart();
        } else {
            echo 'NO ITEMS ADDED TO CART';
        }

        if (isset($_GET['edit'])) {
            echo '
                <div id="edit">
            <form action="" method="post">
            <h3>Edit in the fields provided below</h3>
                <label>Name</label><br>
                <input type="text" value="" name="customer_name" placeholder="Enter Your Name" required><br>
                <label>E-mail</label><br>
                <input type="text" value="" name="customer_email" placeholder="Enter Your Email" required><br>
                <label>Phone No.</label><br>
                <input type="text" value="" name="customer_phone" placeholder="Enter Your Phone Number" required><br>
                <button type="submit" name="edit">Submit</button>
            </form>
            <div class="cancel">
              <button href="">Cancel</button>  
            </div>
        </div>
            ';
        }
            
        ?>

</body>
</html>