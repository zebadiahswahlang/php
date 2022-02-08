<?php
    $hn = "localhost";
    $un = "dbadmin";
    $pw = "12345";
    $dn = "cruddb";

    $conn = new mysqli($hn,$un,$pw,$dn);
    if($conn->connect_error)
        die("Database Connection Failed" . $conn->connect_error);
?>