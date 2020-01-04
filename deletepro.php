<?php
session_start();
require_once './dbconnector.php';
require_once './restrictedsession.php';
if (isset($_POST['proid'])) {
    $proid = sanitizeString($_POST['proid']);
    $query = "DELETE FROM product WHERE ProID = '$proid'";
    queryMysql($query);
    header("Location: Pmanagement.php");
    die("You've deleted the product '$proid' <a href='Pmanagement.php'>click here</a> to continue.");
}
?>

