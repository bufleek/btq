<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
 <div class="cloth">
            <h2>CLOTHES</h2>
             <?php 

                    if(isset($_GET['error'])) {
                        $error = $_GET['error'];
                        if($error = "success"){
                                echo "succesful";
                        }
                    }
                    
                    ?>  
            <form action="../static/includes/item.inc.php" method="post" enctype="multipart/form-data">
                    <input type="text" name="item_name" placeholder="Enter the item's Name" required>
                <label>Price tag:</label>
                    <input type="text" name="price_tag" placeholder="Price-Tag?"  required>
                <label>Item Code:</label>
                    <input type="text" name="item_code" placeholder="Enter unique Item Code" required>
                <label>Size:</label>
                    <input type="text" name="item_size" placeholder="Item size?(Optional)">
                <label>Description:</label>
                    <input type="text" name="item_description" placeholder="Description of the item(Optional)">
                <label>Image1:</label>
                    <input type="file" name="item_image" id="image" required>
                <button type="submit" name="AddCloth">SUBMIT</button>
            </form>
    </div>
    <script>

        function extension(){
            window.alert("THE EXTENSION OF THE FILE ENTERED IS NOT ALLOWED");
        }
        function existing(){
            window.alert("THE FILE OR A SIMILAR FILE NAME ALREADY EXISTS...TRY CHANGING THE FILE NAME");
        }
        function success(){
            window.alert("UPLOAD SUCCESFUL");
        }

    </script>
</body>
</html>
