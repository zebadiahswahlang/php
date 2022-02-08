<?php 
    include "connect.php";

    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $fn = $_POST['fn'];
        $ln = $_POST['ln'];
        $email = $_POST['email'];
        $pw = $_POST['pw'];
    
        $sql = "UPDATE 'users' SET 'firstname' = '$fn','lastname' = '$ln','email' = '$email','password' = '$pw' WHERE 'id' = '$user_id'";
        $result = $conn->query($sql);

        if($result == TRUE)
            echo "Record updated successfully";
        else
        echo "Error:" . $sql . "<br>" . $conn->error;

        $conn->close();
    }

    if(isset($_GET['id'])){
        $user_id = $_GET['id'];

        $sql = "SELECT * FROM 'users' WHERE 'id' = '$user_id'";
        $result = $conn->query($sql);

        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $id = $row['id'];
                $fn = $row['firstname'];
                $ln = $row['lastname'];
                $email = $row['email'];
                $pw = $row['password'];
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
                            <input type="text" name="fn" value="<?php echo $firstname; ?>">
                            <input type="hidden" name="user_id" value="<?php echo $id; ?>"><br>
                            Last Name:<br>
                            <input type="text" name="ln" value="<?php echo $lastname; ?>"><br>
                            Email:<br>
                            <input type="email" name="email" value="<?php echo $email; ?>"><br>
                            Password:<br>
                            <input type="password" name="pw" value="<?php echo $password; ?>"><br><br>
                            <input type="submit" value="update" name="update">
                        </fieldset>
                    </form>
                </body>
            </html>
        <?php
        }
        else
            header('Location: view.php');
    }
?>