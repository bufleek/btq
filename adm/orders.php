<?php
    require "../static/classes/order.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../static/css/orders.css">
    <title>Orders</title>
</head>
<body>

<table id="orders">
                    <thead>
                        <tr>
                            <th style="background:#03692d; font-weight:bold; color:#000;">Item id</td>
                            <th style="background:#03692d; font-weight:bold; color:#000;">Item Name</td>
                            <th style="background:#03692d; font-weight:bold; color:#000;">Customer Name</th>
                            <th style="background:#03692d; font-weight:bold; color:#000;">Date Placed</th>
                        </tr>
                     </thead>

<tbody>
<?php
    $object = new order;
    $object->view_orders();
?>
</tbody>
            
                    
</table>
    
    
</body>
</html>