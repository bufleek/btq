<?php
    include_once "../static/classes/cloth.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Shoe Hub</title>
    <style>
        *{
            margin:0;
            padding:0;
        }
        a{
            cursor:pointer;
            text-decoration:none;
        }
        #table-cloths{
            margin:0 auto;
        }
        #table-cloths tbody tr td img{
            max-width:150px;
        }
        #table-cloths tbody tr td a.edit{
            color:aqua;
        }
        #table-cloths tbody tr td a.delete{
            color:crimson;
        }
        #table-cloths tbody tr td a.more{
            color:deepskyblue;
        }
        #table tbody tr td a:hover{
            color:aliceblue;
        }
    </style>
</head>
<body>

    <form action="../static/includes/item.inc.php" method="POST">
        <h2>ADD TO SLIDES</h2>
        <label>Item ID</label>
        <input type="text" name="item_id" placeholder="Enter item ID" required>
        <input type="submit" name="add_slide" value="ADD">
    </form>


    <div id="table-cloths" class="row col-md-10">
<table class="table table-striped table-dark table-bordered">
  <thead>
    <tr>
      <th scope="col">item_ID</th>
      <th scope="col">Image</th>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
        <?php
                $item = new cloth();
                $cloths = $item->disp_cloth();
                foreach ($cloths as $cloth) {
                   echo '
                   <tr>
                   <th>'.$cloth['itemId'].'</th>
                   <td><img src="../static/images/cloths/'.$cloth['image1'].'"></td>
                   <td>'.$cloth['itemName'].'</td>
                   <td>
                   <a class="edit float-left" style=>Edit</a><br>
                   <a class="delete float-right">Delete</a><br>
                   <a class="more">More</a>
                   </td>
                 </tr>
                   ';
                }
        ?>
  </tbody>
</table>
</div>

</body>
</html>
