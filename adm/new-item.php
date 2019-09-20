<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add item | Admin</title>
</head>
<body>
    <div class="cloth">
            <h2>CLOTHES</h2>
            <form action="../static/includes/item.inc.php" method="post" enctype="multipart/form-data">
                <label>Name:</label>
                    <input type="text" name="itemName" placeholder="Enter the item's Name" required>
                <label>Price tag:</label>
                    <input type="text" name="priceTag" placeholder="Price-Tag?"  required>
                <label>Item Code:</label>
                    <input type="text" name="itemCode" placeholder="Enter unique Item Code" required>
                <label>Size:</label>
                    <input type="text" name="itemSize" placeholder="Item size?(Optional)">
                <label>Description:</label>
                    <input type="text" name="description" placeholder="Description of the item(Optional)">
                <label>Image:</label>
                    <input type="file" name="item_image" id="image" required>
                <button type="submit" name="AddCloth">SUBMIT</button>
            </form>
    </div>
    <div class="shoe">
            <h2>SHOES</h2>
            <form action="../static/includes/item.inc.php" method="post" enctype="multipart/form-data">
                <label>Name:</label>
                    <input type="text" name="itemName" placeholder="Enter the item's Name" required>
                <label>Price tag:</label>
                    <input type="text" name="priceTag" placeholder="Price-Tag?"  required>
                <label>Item Code:</label>
                    <input type="text" name="itemCode" placeholder="Enter unique Item Code" required>
                <label>Size:</label>
                    <input type="text" name="itemSize" placeholder="Item size?(Optional)">
                <label>Description:</label>
                    <input type="text" name="description" placeholder="Description of the item(Optional)">
                <label>Image:</label>
                    <input type="file" name="item_image" id="image" required>
                <button type="submit" name="AddShoe">SUBMIT</button>
            </form>
    </div>


</body>
</html>
