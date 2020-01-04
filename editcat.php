 <?php
require_once 'header.php';
//Check to make sure that user is logged in first
require_once 'restrictedsession.php';
$error = $msg = "";
if (isset($_POST['cname'])) { //updating
    $catid = sanitizeString($_POST['catid']);
    $cname = sanitizeString($_POST['cname']);
   
    //Validate the name
 if ($cname!= ""  ){
        $query = "UPDATE category SET CatName = '$cname' WHERE CatID = '$catid'";
    } else {
         $error = "You must update all values";
        $result = queryMysql($query);
        if (!$result) {
            $error = "Couldn't update product $cname, please try again";
        } else {
            $msg = "Updated $cname successfully";
        }
    }
}
//for loading the data to the screem
if (isset($_POST['catid'])) {
    $catid = sanitizeString($_POST['catid']);
    //Load the current data to that batch
    $query = "SELECT CatName FROM category WHERE CatID = '$catid'";
    $result = queryMysql($query);
    $row = mysqli_fetch_array($result);
    if ($row) {
        $cname = $row[0];
    }
}
?>
<br><br>
<form action="editcat.php" method="POST">
    <fieldset>
        <legend>Edit Category</legend>
        <div class="error"><?php echo $error; ?></div>
        <input type="hidden" value="<?php echo $catid; ?>" name="catid"/>
        Category Name: </br>
        <input type="text" id="cname" name="cname" required value="<?php echo $cname; ?>"/><br>
  
        <input type="submit" value="Finish"/>
        <div><?php echo $msg; ?></div>
    </fieldset>
</form>

</body>
</html>
