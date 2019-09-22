 <div class="cloth">
            <h2>CLOTHES</h2>
            <form action="../static/includes/item.inc.php" method="post" enctype="multipart/form-data">
                <label>Name:</label>
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