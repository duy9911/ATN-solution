<?php
session_start();
require_once './dbconnector.php';
require_once './restrictedsession.php';
if (isset($_POST['catid'])) {
    $catid = sanitizeString($_POST['catid']);
    $query = "DELETE FROM category WHERE CatID = '$catid'";
    queryMysql($query);
    header("Location: Cmanagement.php");
    die("You've deleted the category '$catid' <a href='Cmanagement.php'>click here</a> to continue.");
}
?>

