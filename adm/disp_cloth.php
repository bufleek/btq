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

    <form action="../static/includes/item.inc.php" method="POST">
        <h2>ADD TO SLIDES</h2>
        <label>Item ID</label>
        <input type="text" name="item_id" placeholder="Enter item ID">
        <input type="submit" name="add_slide" value="ADD">
    </form>
    <table id="cloths">
        <tr class="header">
            <th>ID</th>
            <th>Name</th>
            <th>Price_Tag</th>
            <th>Size</th>
            <th>Item_Code</th>
            <th>Description</th>
            <th>Image</th>
            <th>Category</th>
            <th>Action</th>
        </tr>
        <?php
                $item = new cloth();
                $item->select_cloth_to_table();
        ?>
    </table>

</body>
</html>
