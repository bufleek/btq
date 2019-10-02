<?php

class db
{
    private $servername;
    private $serverusername;
    private $serverpassword;
    private $dbname;
    private $conn;

    protected function connect()
    {
        $this->servername = "localhost:3306";
        $this->serverusername = "root";
        $this->serverpassword = "";
        $this->dbname = "btq";

        $conn = new mysqli($this->servername, $this->serverusername, $this->serverpassword, $this->dbname);
        return $conn;
    }
}

class cart extends db
{
    public $price_tag;
    public $item_id;
    public $customer_id;
    public $sum;


    

    public function to_cart($customer_name, $customer_email, $customer_number, $item_id)
    {
        $conn = new db;

        function microtime_float()
        {
            list($usec, $sec) = explode(" ", microtime());
            return ((float)$usec + (float)$sec);
        }
        $customer_id = microtime_float();
        $sql = "SELECT * FROM cloths WHERE itemId=$item_id";
        if ($result = $conn->connect()->query($sql)) {
            while ($row = $result->fetch_assoc()) {
                $item_name = $row['itemName'];
                $item_code = $row['itemCode'];
                $item_size = $row['itemSize'];
                $item_description = $row['description'];
                $item_price = $row['priceTag'];
                $item_image = $row['image1'];
            }
            $sql = "INSERT INTO cart (itemId, itemName, itemSize, itemCode, description, priceTag, image1, customer_id, customer_name, customer_email, customer_number) VALUES('$item_id', '$item_name', '$item_size', '$item_code', '$item_description', '$item_price', '$item_image', '$customer_id', '$customer_name', '$customer_email', '$customer_number')";
            if ($conn->connect()->query($sql)) {
                header("location: ../../pages/cart.php?customer=$customer_id");
                exit();
            } else {
                echo "we are having a problem connecting to the database";
            }
        } else {
            echo "we are having a problem connecting to the database";
        }
    }

    public function view_cart()
    {
        $conn = new db;
        $customer_id = $_GET['customer'];
        $sql = "SELECT customer_name, customer_email, customer_number, itemName, priceTag, itemSize, description, itemCode, image1, sum(priceTag) AS total FROM cart WHERE customer_id = $customer_id";
        if ($result = $conn->connect()->query($sql)) {
            while ($row = $result->fetch_assoc()) {
                $customer_name = $row['customer_name'];
                $customer_email = $row['customer_email'];
                $customer_phone = $row['customer_number'];

                $item_name = $row['itemName'];
                $item_price = $row['priceTag'];
                $item_size = $row['itemSize'];
                $item_description = $row['description'];
                $item_code = $row['itemCode'];
                $item_image = $row['image1'];
                $total = $row['total'];

                echo '
                   <div id="cart">
        <div class="itemdetails">
            <h2>My Item</h2>
            <p><strong>Name :</strong> '.$item_name.'</p>
            <p><strong>Item size :</strong> '.$item_size.'</p>
            <p><strong>Item description :</strong> '.$item_description.'</p>
            <img src="../static/images/cloths/'.$item_image.'" alt="Item name">
        </div>
        <div class="customerdetails">
            <h2>Customer Details</h3>
            <p><strong>Name :</strong> '.$customer_name.'</p>
            <p><strong>Email :</strong> '.$customer_email.'</p>
            <p><strong>Phone no :</strong> '.$customer_phone.'</p>
            <button href="#" class="edit">EDIT</button>
        </div>
        <div class="checkout">
            <h2>Checkout</h3>
            <p><strong>Total Amount :</strong> '.$total.'</p>
            <p><strong>Delivery Terms :</strong></p>
            <button href="#" class="confirm">CONFIRM ORDER</button>
        </div>
    </div>
                    
                ';
            }
        } else {
            echo "we are having a problem connecting to the database";
        }
    }

    public function edit_cart()
    {
        $conn = new db;

        $sql = "UPDATE TABLE cart SET customer_name=$customer_name, customer_email=$customer_email, customer_number=$customer_phone WHERE customer_id=$customer_id";
        if ($conn->connect()->query($sql)) {
            echo "updated";
        } else {
            echo "we are having a problem connecting to the database";
        }
    }
}
