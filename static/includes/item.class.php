
<?php
require "db.php";

class cloth extends db{

public function insert_cloth(){
    
    $conn = new db();
    

    if ($conn->connect()) {
        $item_name = mysqli_real_escape_string($conn->connect(), $_POST['item_name']);
        $item_code = mysqli_real_escape_string($conn->connect(), $_POST['item_code']);
        $item_size = mysqli_real_escape_string($conn->connect(), $_POST['item_size']);
        $price_tag = mysqli_real_escape_string($conn->connect(), $_POST['price_tag']);
        $description = mysqli_real_escape_string($conn->connect(), $_POST['item_description']);
        //image variables
        $file_name = $_FILES["item_image"]["name"];
        $file_type = $_FILES["item_image"]["type"];
        $file_size = $_FILES["item_image"]["size"];

        //check file extension
        $allowed = array("jpg" => "image/jpg", "JPG" => "image/JPG", "jpeg" => "image/jpeg", "JPEG" => "image/JPEG", "gif" => "image/gif", "GIF" => "image/GIF", "png" => "image/png", "PNG" => "image/PNG");
        $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
        if (array_key_exists($file_extension, $allowed)) {
            //check if file exists
            if(!file_exists("../images/cloths/" . $file_name)){

                $sql = "INSERT INTO cloths (itemName, itemCode, itemSize, priceTag, description, image1) values('$item_name', '$item_code', '$item_size', '$price_tag', '$description', 'cloths/$file_name')";

                move_uploaded_file($_FILES["item_image"]["tmp_name"], "../images/cloths/" . $file_name);

                $conn->connect()->query($sql);


                
            }else {
                exit("FILE NAME ALREADY EXISTS TRY CHANGING FILE NAME");
            }

        }else {
            exit("FILE EXTENSION NOT ALLOWED");
        }
   
    }else{
        exit("SORRY COULD NOT CONNECT TO THE DATABASE");
    }
    }




    //Select clothes from db and loop
    public $item_id;
    public $item_name;
    public $price_tag;
    public $iyem_code;
    public $item_size;
    public $item_description;
    public $item_image;

    public function select_cloth_to_table(){

        $conn = new db();
        $sql = "SELECT * FROM cloths";
        if ($cloths = $conn->connect()->query($sql)) {

             while ($cloth = $cloths->fetch_assoc()) {

                $this->item_id = $cloth["itemId"];
                $this->item_name = $cloth["itemName"];
                $this->price_tag = $cloth["priceTag"];
                $this->item_code = $cloth["itemCode"];
                $this->item_size = $cloth["itemSize"];
                $this->item_description = $cloth["description"];
                $this->item_image = $cloth["image1"];


                echo '<tr>';
                echo '<td>' . $this->item_id . '</td>';
                echo '<td>' . $this->item_name . '</td>';
                echo '<td>' . $this->price_tag . '</td>';
                echo '<td>' . $this->item_code . '</td>';
                echo '<td>' . $this->item_size . '</td>';
                echo '<td>' . $this->item_description . '</td>';
                echo '<td>' . $this->item_image . '</td>';
                echo '</tr>';

            }
        }
        else{
            echo "DATABASE CONNECTION FAILED";
        }
    }



}
