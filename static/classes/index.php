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
                <div data-idle="7000">
                <a href="?id='.$item_id.'"><img data-u="image" src="static/images/cloths/'.$item_image.'" /></a>
                <div data-u="thumb">
                <span style="font-size:25px;" class="captionHolder">'.$item_description.'</span>
                <a class="buy captionHolder"" href="?id='.$item_id.'">Ksh '.$item_price.'</a>
                </div>
               
                </div>
                ';
            }
        } else {
            echo "we are having a problem connecting to the database";
        }
        
    }

    public function card(){
        $conn = new db;
        $sql = "SELECT * from cloths";
        if($result = $conn->connect()->query($sql)){
            while($row = $result->fetch_assoc()){
                $item_id = $row['itemId'];
                $item_image = $row['image1'];
                $item_price = $row['priceTag'];
                $item_name = $row['itemName'];
                $item_description = $row['description'];
                $item_size = $row['itemSize'];

                echo '
                <div class="card">
                    <div class="top-phase">
                        <img src="static/images/cloths/'.$item_image.'" alt="'.$item_name.'">
                    </div>
                    <div class="in-phase">
                        <h4>'.$item_name.'</h4>
                        <a href="?id='.$item_id.'">ORDER<br>Ksh: '.$item_price.'</a>
                        <p>'.$item_description.'</p>
                    </div>
                </div>
                ';
            }
        }else{
            echo "we are having a problem connecting to the ddatabase";
        }
    }
} 