<!DOCTYPE html>
<html>
<head>
    
	<title>Add Category</title>
</head>
<body>
<?php 

$false = $msg = "";
require 'header.php';
if(isset($_POST['CatName']))
{
	$CatName = sanitizeString($_POST['CatName']);
      if ($CatName!= "" ){
        $query = "INSERT INTO category(CatName) values (' $CatName')"; 
       
      }
 else {
          echo 'You must create a name category';
      }

    }

?>
    <form action="addCategory.php" method="post">
        <br>
	<h2 align="center">Add Category</h2>
        <p align="center">
	Category: <input type="text" name="CatName"> <br>
	<input type="Submit" value ="Add Category">
        </p>
</form>
</body>
</html>