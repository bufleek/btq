
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        *{
            padding:0;
            margin:0;
        }
        .product{
            width:708px;
            height: 450px;
            border:1px solid black;
            display:grid;
            grid-template-rows:400px 50px;
        }
        .product .image{
            display:flex;
            flex-direction:column;
            justify-content:center;
            align-items:center;
        }
        .product .image img{
            max-width:calc(100%-4px);
        }
        .product .about_product{
            display:grid;
            grid-template-columns:1fr 1fr 1fr;
            border:1px solid black;
        }
    </style>
</head>
<body>
    <?php

        require "static/classes/cloth.php";

        $object = new cloth;
        $object->select_cloth_to_card();

        if (isset($_GET['id'])) {
            $item_id = $_GET['id'];
        }

    ?>

    
    
</body>
</html>