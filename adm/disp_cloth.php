<?php
    include_once "../static/classes/cloth.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shoe Hub</title>

    <style>
        #cloths{
            border:1px solid black;
            border-collapse: collapse;
        }
        #cloths tr.header{
            background:#b98;
        }
        #cloths tr td{
            border:1px solid black;
        }
        #cloths tr:nth-child(even){
            background:#ffff00;
        }
    </style>
</head>
<body>
    <table id="cloths">
        <tr class="header">
            <th>ID</th>
            <th>Name</th>
            <th>Price_Tag</th>
            <th>Size</th>
            <th>Item_Code</th>
            <th>Description</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
        <?php
                $item = new cloth();
                $item->select_cloth_to_table();
        ?>
    </table>

</body>
</html>
