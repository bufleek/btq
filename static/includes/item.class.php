
<?php

class AddCloth {
        public function insert_cloth(){

            try{
    $pdo = new PDO("mysql:host=localhost;dbname=btq", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e){
                 die("ERROR: Could not connect. " . $e->getMessage());
            }
         try {

                 $filename = $_FILES["item_image"]["name"];
            
                 $sql = "INSERT INTO cloths (itemName, priceTag, itemCode, itemSize, description, image1) VALUES (:itemName, :priceTag, :itemCode, :itemSize, :description, :itemImage)";
                 $stmt = $pdo->prepare($sql);

                $stmt->bindParam(':itemName', $itemName, PDO::PARAM_STR);
                $stmt->bindParam(':priceTag', $priceTag, PDO::PARAM_STR);
                $stmt->bindParam(':itemCode', $itemCode, PDO::PARAM_STR);
                $stmt->bindParam(':itemSize', $itemSize, PDO::PARAM_STR);
                $stmt->bindParam(':description', $description, PDO::PARAM_STR);
                $stmt->bindParam(':itemImage', $itemImage, PDO::PARAM_STR);

                $itemName = $_POST['itemName'];
                $priceTag = $_POST['priceTag'];
                $itemCode = $_POST['itemCode'];
                $itemSize = $_POST['itemSize'];
                $description = $_POST['description'];
                $itemImage = $filename;

                $stmt->execute();
                echo "Records inserted successfully.";

            } catch (PDOException $e) {
                exit("ERROR: Could not prepare/execute query: $sql. " . $e->getMessage());
            }

           unset($stmt);
           unset($pdo);
                     
        }
}



class process_image_cloth{

    public function process_image(){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["item_image"]["name"];
        $filetype = $_FILES["item_image"]["type"];
        $filesize = $_FILES["item_image"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) exit("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        //$maxsize = 5 * 1024 * 1024;
        //if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            if(file_exists("../images/cloths/" . $filename)){
                exit($filename . " already exists.");
            }
        }
    }

    public function move_image(){
        $filename = $_FILES["item_image"]["name"];
         move_uploaded_file($_FILES["item_image"]["tmp_name"], "../images/cloths/" . $filename);
                echo "Your file was uploaded successfully.";
    }
}



class Fetch_Cloth{
    public function Fetch_Cloth(){
        $pdo = new PDO("mysql:host=localhost;dbname=btq", "root", "");
        $sql = "SELECT * FROM clothes";
        $pdo->execute($sql);
    }
}
