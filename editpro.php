 <?php
require_once 'header.php';
//Check to make sure that user is logged in first
require_once 'restrictedsession.php';
$error = $msg = "";
if (isset($_POST['proname'])) { //updating
    $proid = sanitizeString($_POST['proid']);
    $proname = sanitizeString($_POST['proname']);
    $proimg = sanitizeString($_POST['proimg']);
    $price = sanitizeString($_POST['price']);

    //Validate the name
    if ($proname!= "" && $proimg != "" && $price != "" && $price>0){
        $query = "UPDATE product SET ProName = '$proname',ProPrice ='$price',ProImage='$proimg' WHERE ProID = '$proid'";
    } else {
         $error = "You must update all values";
        $result = queryMysql($query);
        if (!$result) {
            $error = "Couldn't update product $proname, please try again";
        } else {
            $msg = "Updated $proname successfully";
        }
    }
}
//for loading the data to the form
if (isset($_POST['proid'])) {
    $proid = sanitizeString($_POST['proid']);
    //Load the current data to that batch
    $query = "SELECT ProName FROM product WHERE ProID = '$proid'";
    $result = queryMysql($query);
    $row = mysqli_fetch_array($result);
  
}
?>
<br><br>
<form action="editpro.php" method="POST">
    <fieldset>
        <legend>Edit Product<?php echo $error; ?></div>
        <input type="hidden" value="<?php echo $proid; ?>" name="proid"/>
        Product Name: </br>
        <input type="text" id="pName" name="proname" required /><br>
        Product Image: </br>
        <input type="file" id="pimg" name="proimg" required /><br>
        Product Price: </br>
        <input type="number" id="price" name="price" required /><br>
        
  
        <input type="submit" value="Finish"/>
        <div><?php echo $msg; ?></div>
    </fieldset>
</form>
<script>
   // $("$proname").on("input", function ()) {
    //    var value = $(this).val();
   //     if (!/^G[BCD][HS]\d{4}$/.test(value)) {
   //         this.setCustomValidity("Incorrect format (exam., GCH0401");
    //    } else {
      //      this.setCustomValidity("correct roi ne");
   //     }
  //  });
</script>
</body>
</html>
