<?php
    include "connect.php";
    
    if(isset($_POST['submit'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $mail = $_POST['email'];
        $pass = $_POST['pass'];
    
        $query = "INSERT INTO users(firstname,lastname,email,password)VALUES('$fname','$lname','$mail','$pass')";
        $result=mysqli_query($conn,$query);

        if($result == TRUE){
            echo "New record created successfully";
            echo "Click to View Record";
            header('Location: read.php');
        }
        else
            echo "Error:" . $query . "<br>" . $conn->error;
        $conn->close();
    }
?>