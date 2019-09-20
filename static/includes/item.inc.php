
<?php 

if($_SERVER["REQUEST_METHOD"] == "POST"){
    include "item.class.php";
}
else{
    exit("NO ACCES");
}
if (isset($_POST['AddCloth'])) {
    if (isset($_FILES["item_image"]) && $_FILES["item_image"]["error"] == 0) {
        $object = new process_image_cloth;
        $object->process_image();
        
        $object = new AddCloth;
        $object->insert_cloth();

        $object = new process_image_cloth;
        $object->move_image();
    }
    else{
        exit("Error: " . $_FILES["item_image"]["error"]);
    }
}
else{
    exit("NO ACCES");
}

