
<?php
class clothdb{
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

class cloth extends clothdb{

public function insert_cloth(){
    
    $conn = new clothdb();
    

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

                $sql = "INSERT INTO cloths (itemName, itemCode, itemSize, priceTag, description, image1) values('$item_name', '$item_code', '$item_size', '$price_tag', '$description', '$file_name')";

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

        $conn = new clothdb();
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

                echo '
                <tr>
                <td> ' .$this->item_id .' </td>
                <td> ' .$this->item_name .' </td>
                <td> ' .$this->price_tag .'</td>
                <td> ' .$this->item_code .'</td>
                <td> ' .$this->item_size .'</td>
                <td> ' .$this->item_description .'</td>
                <td> ' .$this->item_image .'</td>
                <td> <a href="../static/includes/delete.item.php?id=' .$this->item_id .'&img='. $this->item_image .'">DELETE</a></td>
                ';
            }
        }
        else{
            echo "DATABASE CONNECTION FAILED";
        }
    }

    public function delete_cloth(){
        $conn = new clothdb;

        $item_cloth = $_GET['id'];
        $item_image = $_GET['img'];
        $path = '../images/cloths/'.$item_image.'';

        $sql = "DELETE FROM cloths WHERE itemId = $item_cloth";
        if($conn->connect()){
        if(file_exists($path)){
            unlink($path);
            $conn->connect()->query($sql);
            header("location: ../../adm/disp_cloth.php?deleted");

        }
        else{
            exit("IMAGE DOES NOT EXIST IN DIRECTORY");
        }
        }else{
            exit("DATABASE CONNECTION FAILED");
        }
    }

    public function select_cloth_to_card(){
        $conn = new clothdb;

        $sql = "SELECT * FROM cloths ORDER BY itemId limit 5";
        if ($cloths = $conn->connect()->query($sql)) {

            while($cloth = $cloths->fetch_assoc()){

                $this->item_id = $cloth["itemId"];
                $this->item_name = $cloth["itemName"];
                $this->price_tag = $cloth["priceTag"];
                $this->item_code = $cloth["itemCode"];
                $this->item_size = $cloth["itemSize"];
                $this->item_description = $cloth["description"];
                $this->item_image = $cloth["image1"];
                $path = 'static/images/cloths/'.$this->item_image.'';


                echo '
                    <div class="product" id="'.$this->item_id.'">
                        <div class="image">
                            <img src="'.$path.'" alt="'.$this->item_name.'">
                        </div>
                        <div class="about_product">
                            <p class="price_tag">PRICE: Ksh. '.$this->price_tag.'</p>
                            <a href="?id='.$this->item_id.'" class="buy">PLACE ORDER</a>
                            <p class="more">More Details</p>
                        </div>
                    </div>

                ';


            }
            
        }


    }


}

