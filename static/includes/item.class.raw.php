
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
        //image1
        $file_name = $_FILES["item_image"]["name"];
        $file_type = $_FILES["item_image"]["type"];
        $file_size = $_FILES["item_image"]["size"];
        //image2
        $file_name2 = $_FILES["item_image2"]["name"];
        $file_type2 = $_FILES["item_image2"]["type"];
        $file_size2 = $_FILES["item_image2"]["size"];
        //image2
        $file_name3 = $_FILES["item_image3"]["name"];
        $file_type3 = $_FILES["item_image3"]["type"];
        $file_size3 = $_FILES["item_image3"]["size"];
        //image2
        $file_name4 = $_FILES["item_image4"]["name"];
        $file_type4 = $_FILES["item_image4"]["type"];
        $file_size4 = $_FILES["item_image4"]["size"];
        //image2
        $file_name5 = $_FILES["item_image5"]["name"];
        $file_type5 = $_FILES["item_image5"]["type"];
        $file_size5 = $_FILES["item_image5"]["size"];

        //check file extension
        $allowed = array("jpg" => "image/jpg", "JPG" => "image/JPG", "jpeg" => "image/jpeg", "JPEG" => "image/JPEG", "gif" => "image/gif", "GIF" => "image/GIF", "png" => "image/png", "PNG" => "image/PNG");
        $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
        $file_extension2 = pathinfo($file_name2, PATHINFO_EXTENSION);
        $file_extension3 = pathinfo($file_name3, PATHINFO_EXTENSION);
        $file_extension4 = pathinfo($file_name4, PATHINFO_EXTENSION);
        $file_extension5 = pathinfo($file_name5, PATHINFO_EXTENSION);
        if (!array_key_exists($file_extension, $allowed)) {
           exit("IMAGE 1 EXTENSION NOT ALLOWED");
        }else {             
            if(!file_exists("../images/cloths/" . $file_name)){

               if(!empty($file_name2)){

        if (!array_key_exists($file_extension2, $allowed)) {
            exit("IMAGE 2 EXTENSION NOT ALLOWED");
        }else{
            if(file_exists("../images/cloths/" . $file_name2)){
                exit("IMAGE 2 ALREADY EXISTS");
            }
        }

    }
    elseif(!empty($file_name3)){

        if (!array_key_exists($file_extension3, $allowed)) {
            exit("IMAGE 3 EXTENSION NOT ALLOWED");
        }else{
            if(file_exists("../images/cloths/" . $file_name3)){
                exit("IMAGE 3 ALREADY EXISTS");
            }
        }

    }
    elseif(!empty($file_name4)){

        if (!array_key_exists($file_extension4, $allowed)) {
            exit("IMAGE 4 EXTENSION NOT ALLOWED");
        }else{
            if(file_exists("../images/cloths/" . $file_name4)){
                exit("IMAGE 4 ALREADY EXISTS");
            }
        }

    }
    elseif(!empty($file_name5)){

        if (!array_key_exists($file_extension5, $allowed)) {
            exit("IMAGE 5 EXTENSION NOT ALLOWED");
     }else{
            if(file_exists("../images/cloths/" . $file_name5)){
                exit("IMAGE 5 ALREADY EXISTS");
            }
        }

    }
    else{
     $sql = "INSERT INTO cloths (itemName, itemCode, itemSize, priceTag, description, image1, image2, image3, image4, image5) values('$item_name', '$item_code', '$item_size', '$price_tag', '$description', 'cloths/$file_name', 'cloths/$file_name2', 'cloths/$file_name3', 'cloths/$file_name4', 'cloths/$file_name5')";

                move_uploaded_file($_FILES["item_image"]["tmp_name"], "../images/cloths/" . $file_name);
                move_uploaded_file($_FILES["item_image2"]["tmp_name"], "../images/cloths/" . $file_name2);
                move_uploaded_file($_FILES["item_image3"]["tmp_name"], "../images/cloths/" . $file_name3);
                move_uploaded_file($_FILES["item_image4"]["tmp_name"], "../images/cloths/" . $file_name4);
                move_uploaded_file($_FILES["item_image5"]["tmp_name"], "../images/cloths/" . $file_name5);

                $conn->connect()->query($sql);
                echo "successful";
    }
        }else {
                exit("FILE NAME ALREADY EXISTS TRY CHANGING FILE NAME");
            }
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





