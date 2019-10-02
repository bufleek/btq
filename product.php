
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="static/css/product.css">
    <title>Document</title>
</head>
<body>
    <?php

        require "static/classes/cloth.php";

        $object = new cloth;
        $object->select_cloth_to_card();

        if (isset($_GET['id'])) {
            $item_id = $_GET['id'];

            echo '
                
    <div id="addtocart_pop_up">
        <div class="close">&times;</div>
        <div class="blank2"></div>
        <div class="blank3"></div>
        <div class="bottom">
            <button class="cancel">Cancel order</button>
        </div>
        <div class="user_form">
        <h3>MY ORDER</h3>
            <form action="static/includes/to_cart.php" method="POST">
                <label>ITEM ID.</label><br>
                <input type="text" name="item_id" value="'.$item_id.'" readonly="readonly"><br>
                <h4>Please provide us with your contact details below so that we can reach you</h4>
                <label>NAME</label><br>
                <input type="text" name="customer_name" placeholder="Enter your full names here" required><br>
                <label>E-MAIL</label><br>
                <input type="text" name="customer_email" placeholder="Enter your Email" required><br>
                <label>PHONE NO.</label><br>
                <input type="text" name="customer_number" placeholder="Enter Your Phone Number" required><br>
                
                <button type="submit" name="to_cart" class="proceed">Proceed</button>
            </form>
        </div>

    </div>
            ';
        }

    ?>

    
    
</body>
</html>