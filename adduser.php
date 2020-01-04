<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8">
        <title></title>
    </head>
    <body>
        <h1>Setting up...</h1>
<?php

        require_once './dbconnector.php';
        $username = "admin";
        $password = "pass";
        $status = '1';
        if(addUser($username, $password, $status)) {
            echo "<br>Added user $username <br>";
        } else {
            echo "<br>User <b>$username</b> already exists";
        }
        $username = "admin2";
        $password = "pass2";
        $status = '1';
        
        
        if (addUser($username, $password, $status)) {
            echo "Added user $username, please change the password";
        } else {
            echo "<br>User <b>$username</b> already exists";
        }
?>        
    </body>
      </html>