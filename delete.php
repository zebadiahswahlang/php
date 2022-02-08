<?php
    include "connect.php";

    if(isset($_GET['id'])){
        $user_id = $_GET['id'];

        $query = "DELETE FROM users WHERE id = '$user_id'";
        $result = mysqli_query($conn,$query);

        if($result == TRUE){
            echo "Record deleted successfully";
            header('refresh:2; url=read.php');
        }
        else
        echo "Error:" . $query . "<br>" . $conn->error;
    }
?>