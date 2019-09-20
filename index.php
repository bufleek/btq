<?php
    include_once "static/includes/db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shoe Hub</title>
</head>
<body>
    <?php 
    

        class test{
            public function test(){
            
                $this->pd = "i dont know";
            }
        }  


        $object = new test;
        $object->test();
        $de = $object->pd;
        echo "'.$de.'";
    ?>
</body>
</html>
