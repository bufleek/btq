<?php

class db
{
    private $servername;
    private $serverusername;
    private $serverpassword;
    private $dbname;

    protected function connect()
    {
        $this->servername = "localhost";
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

    public function view_cart($customer_id)
    {
        $conn = new db;
        
        $sql = "SELECT  *  FROM cart WHERE customer_id = $customer_id";
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
            <p><a href="?edit&customer='.$customer_id.'" class="edit">EDIT</a></p>
        </div>
        <div class="checkout">
            <h2>Checkout</h3>
            <p><strong>Total Amount :</strong> '.$item_price.'</p>
            <p><strong>Delivery Terms :</strong></p>
            <p><a href="../static/includes/to_cart.php?confirm&customer='.$customer_id.'" class="confirm">CONFIRM ORDER</a></p>
        </div>
    </div>
                    
                ';
            }
        } else {
            echo "we are having a problem connecting to the database";
        }
    }


    public function fetch_edit_customer($customer_id){

        $conn = new db;
        $sql = "SELECT customer_email, customer_name, customer_number FROM cart WHERE customer_id=$customer_id";

        if ($result = $conn->connect()->query($sql)) {
            while ($row = $result->fetch_assoc()) {
                $customer_name = $row['customer_name'];
                $customer_email = $row['customer_email'];
                $customer_phone = $row['customer_number'];
                
                echo '
                <div id="edit">
            <form action="../static/includes/to_cart.php?customer='.$customer_id.'" method="post">
            <h3>Edit in the fields provided below</h3>
                <label>Name</label><br>
                <input type="text" value="'.$customer_name.'" name="customer_name" placeholder="Enter Your Name" required><br>
                <label>E-mail</label><br>
                <input type="text" value="'.$customer_email.'" name="customer_email" placeholder="Enter Your Email" required><br>
                <label>Phone No.</label><br>
                <input type="text" value="'.$customer_phone.'" name="customer_phone" placeholder="Enter Your Phone Number" required><br>
                <button type="submit" name="edit_customer">Submit</button>
            </form>
            <div class="cancel">
              <a href="?customer='.$customer_id.'">Cancel</a>  
            </div>
        </div>
            ';
            }
        } else {
            echo "We are having a problem connecting to the database";
        }
        
    }

    public function edit_customer_info($customer_name, $customer_id, $customer_email, $customer_phone){
        $conn = new db;
       
            $sql = "UPDATE cart SET customer_name='$customer_name', customer_email='$customer_email', customer_number='$customer_phone' WHERE customer_id=$customer_id";
            if ($conn->connect()->query($sql)) {
                header("location: ../../pages/cart.php?edited&customer=$customer_id");
            } else {
                 echo "We are having a problem connecting to the database";
            }
            
        }

    }

