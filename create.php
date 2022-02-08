<?php
    include "connect.php";
    
    if(isset($_POST['submit'])){
        $fn = $_POST['fn'];
        $ln = $_POST['ln'];
        $email = $_POST['email'];
        $pw = $_POST['pw'];
    
        $sql = "INSERT INTO 'users' ('firstname','lastname','email','password') VALUES ('$fn','$ln','$email','$pw')";
        $result = $conn->query($sql);

        if($result == TRUE)
            echo "New record created successfully";
        else
        echo "Error:" . $sql . "<br>" . $conn->error;

        $conn->close();
    }
?>