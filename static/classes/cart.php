<?php 

class db{
    private $servername;
    private $serverusername;
    private $serverpassword;
    private $dbname;
    private $conn;

    protected function connect(){

        $this->servername = "localhost";
        $this->serverusername = "root";
        $this->serverpassword = "";
        $this->dbname = "btq";

        $conn = new mysqli($this->servername, $this->serverusername, $this->serverpassword, $this->dbname);
        return $conn;
    }
}

class cart extends db{
    public $price_tag;
    public $item_id;
    public $customer_id;
    public $sum;

    public function add_to_cart(){
        $conn = new db;

        $this->item_id = $_GET['id'];

        $sql = "SELECT priceTag FROM cloths WHERE itemId = $this->item_id";
        $result = $conn->connect()->query($sql);

        function microtime_float()
        {
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
        }

        $this->customer_id = microtime_float();
        if($row = $result->fetch_assoc()){
            $this->price_tag = $row['priceTag'];

            $sql = "INSERT INTO cart (itemId, priceTag, customer_id, totalAmount) VALUES('$this->item_id', '$this->price_tag', '$this->customer_id', '0')";

            if($conn->connect()->query($sql)){
                header("location: ../includes/add_to.cart.php?added&customer=$this->customer_id");
            }else{
                echo "We are having a problem connecting to the database";
            }
            
        }

    }
    public function view_cart($customer_id){
        $conn = new db;

        $sql = "SELECT priceTag, itemId, sum(priceTag) AS total FROM cart WHERE customer_id=$customer_id";
    if ($result = $conn->connect()->query($sql)) {
        while($row = $result->fetch_assoc()){
            $this->price_tag = $row['priceTag'];
            $this->item_id = $row['itemId'];
            $this->sum = $row['total'];


            echo '
                <p>ITEM_ID: '.$this->item_id.'</p>
                <p>PRICE: Ksh '.$this->price_tag.'</p>
                <p>TOTAL: Ksh '.$this->sum.'</p>
            ';
        }

    } else {
        echo "we are having a problem connecting to the database";
    }
            



    }
}
