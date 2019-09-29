
<?php 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "../classes/cloth.php";
}
else{
    exit("NO ACCES");
}
if (isset($_POST['AddCloth'])) {
    if (isset($_FILES["item_image"]) && $_FILES["item_image"]["error"] == 0) {
        $object = new cloth();
        $object->insert_cloth();
    }
    else{
        exit("Error: " . $_FILES["item_image"]["error"]);
    }
}
else{
    exit("NO ACCES");
}

