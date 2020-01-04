<!DOCTYPE html>
<html>
 
    <body>
        <?php
        $error = $msg = "";
      
        require_once('./dbconnector.php');
        if (isset($_POST['add'])) {
            $pname = $_POST['pname'];
            $pp = $_POST['pp'];
	    $cselect = $_POST['cselect'];
            $pdetail = $_POST['pdetail'];
            $pimg = "";
            $extension = "";
            $pid = "";
            //Process the uploaded image
            if (isset($_FILES['pimg']) && $_FILES['pimg']['size'] != 0) {
                $temp_name = $_FILES['pimg']['tmp_name'];
                $name = $_FILES['pimg']['name'];
                
                $parts = explode(".", $name);
                $lastIndex = count($parts) - 1;
                $extension = $parts[$lastIndex];
                $pimg = "$pid.$extension";
                $destination = "./images/products/$pimg";
                //Move the file from temp loc => to our image folder
                move_uploaded_file($temp_name, $destination);
            }		
            $cselect = sanitizeString($_POST['cselect']);
    //TODO: Do the PHP validation here to protect your server
    //Add the product
    $query = "INSERT INTO product values ('$pid','$pname','$pp','$pimg','$pdetail','$cselect')";
    $result = queryMySql($query);
    if (!$result) {
        $error = $error . "<br>Can't add product, please try again";
    } else {
        $msg = "Added $pname successfully!";
    }
           
        }
        ?>
        <form action="addProduct.php" method="POST" enctype="multipart/form-data">
    <fieldset class = "fitContent">
        <div class="error"><?php echo $error; ?></div>
        <div class="msg"><?php echo $msg; ?></div>
        <legend>Add  Product</legend>
        <input type="hidden" name="pid" maxlength="50" required/><br>
        Product Name: <br>
        <input type="text" name="pname" maxlength="50" required/><br>
        Price:<br>
        <input type="int" name="pp" maxlength="15"/><br>
        Image:<br>
        <input type="file" name="pimg"/><br>
        Product detail: <br>
        <input type="text" name="pdetail"  required/><br>
        Select Catgory:<br>
        <select name="cselect">
            <?php
            $query = "SELECT CatID, CatName FROM category";
            $catgorys = queryMysql($query);
            while ($cat = mysqli_fetch_array($catgorys)) {
                $CatID = $cat[0];
                $CatName = $cat[1];
                echo "<option value='$CatID'>$CatName</option>";
            }
            ?>
        </select><br><br>
        <input type="submit" value="Add" name="add"/>
    </fieldset>
</form>  
</body>
</html>