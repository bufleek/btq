<?php
class db{
    private $servername;
    private $serverusername;
    private $serverpassword;
    private $dbname;

    protected function connect(){

        $this->servername = "localhost";
        $this->serverusername = "root";
        $this->serverpassword = "";
        $this->dbname = "btq";

        $conn = new mysqli($this->servername, $this->serverusername, $this->serverpassword, $this->dbname);
        return $conn;
    }
}

class index extends db{
    public function slide(){
        $conn = new db;
        $sql = "SELECT * FROM slides";
        if ($result = $conn->connect()->query($sql)) {
            while($row = $result->fetch_assoc()){
                $item_id = $row['itemId'];
                $item_image = $row['image1'];
                $item_price = $row['priceTag'];
                $item_name = $row['itemName'];
                $item_description = $row['description'];
                $item_size = $row['itemSize'];

                echo '
                <div>
                <img data-u="image" src="static/images/cloths/'.$item_image.'" />
                <div data-u="thumb" class="slide_description">
                <span>'.$item_description.'</span>
                <span class="price">KSH '.$item_price.'</span>
                <a class="buy" href="?'.$item_id.'">BUY</a>
                </div>
               
                </div>
                ';
            }
        } else {
            echo "we are having a probleme connecting to the database";
        }
        
    }
} 