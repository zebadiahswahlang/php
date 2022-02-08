<?php 
    include "connect.php";

    if(isset($_GET['id'])){
        $user_id = $_GET['id'];

        $query1 = "SELECT * FROM users WHERE id = '$user_id'";
        $result = mysqli_query($conn,$query1);

        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $id = $row['id'];
                $fname = $row['firstname'];
                $lname = $row['lastname'];
                $email = $row['email'];
                $pass = $row['password'];
            }
        ?>
            <!DOCTYPE html>
            <html>
                <head>
                    <title>View Page</title>
                </head>
                <body>
                    <h2>Update Form</h2>
                    <form action="" method="post">
                        <fieldset>
                            First Name:<br>
                            <input type="text" name="fname" value="<?php echo $fname; ?>">
                            <input type="hidden" name="user_id" value="<?php echo $id; ?>"><br>
                            Last Name:<br>
                            <input type="text" name="lname" value="<?php echo $lname; ?>"><br>
                            Email:<br>
                            <input type="email" name="email" value="<?php echo $email; ?>"><br>
                            Password:<br>
                            <input type="password" name="pass" value="<?php echo $password; ?>"><br><br>
                            <input type="submit" value="Update" name="update">
                        </fieldset>
                    </form>
                </body>
            </html>
        <?php
        }
        else{
            header('Location: read.php');
        }   
    }

    if(isset($_POST['update'])){
        //$uid = $_POST['id'];
        $fn = $_POST['fname'];
        $ln = $_POST['lname'];
        $mail = $_POST['email'];
        $pw = $_POST['pass'];
    
        $query = "UPDATE users SET firstname = '$fn', lastname = '$ln', email = '$mail', password = '$pw' WHERE id = '$user_id'";
        $result = mysqli_query($conn,$query);

        if($result == TRUE){
            echo "Record updated successfully";
            header('refresh:2; url=read.php');
        }
        else
        echo "Error:" . $query . "<br>" . $conn->error;

        $conn->close();
    }

?>