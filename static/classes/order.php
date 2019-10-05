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

class order extends db{

    public function confirm_order($customer_id){
            $conn = new db;

            $sql = "SELECT * FROM cart WHERE customer_id=$customer_id";
            if($result = $conn->connect()->query($sql)){
                while($row = $result->fetch_assoc()){
                    $item_id = $row['itemId'];
                    $item_price = $row['priceTag'];
                    $item_code = $row['itemCode'];
                    $item_size = $row['itemSize'];
                    $item_description = $row['description'];
                    $item_name = $row['itemName'];
                    $item_image = $row['image1'];

                    $customer_email = $row['customer_email'];
                    $customer_name = $row['customer_name'];
                    $customer_phone = $row['customer_number'];
                }

                $sql = "INSERT INTO orders (itemId, itemName, priceTag, itemSize, itemCode, image1, description, customer_name, customer_email, customer_number, customer_id) VALUES('$item_id', '$item_name', '$item_price', '$item_size', '$item_code', '$item_image', '$item_description', '$customer_name', '$customer_email', '$customer_phone', '$customer_id')";
                if ($conn->connect()->query($sql)) {
                    $sql = "DELETE FROM cart WHERE customer_id=$customer_id";
                    if ($conn->connect()->query($sql)) {
                        header("location: ../../product.php?confirmed&customer=$customer_id");
                    } else {
                        echo "we are having a problem connecting to the database";
                    }
                    
                } else {
                    echo "We are having a problem connecting to the database";
                } 

            }else{
                echo "we are having a problem connecting to the database";
            }
    }
}