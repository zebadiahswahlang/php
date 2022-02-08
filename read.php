<?php
    include "connect.php";

    $query = "SELECT * FROM users";
    $result = mysqli_query($conn,$query);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>View Page</title>
    </head>
    <body>
        <div>
            <h2>Users</h2>
            <table>
                <thead>
                    <tr>
                        <td>ID</td>
                        <td>First Name</td>
                        <td>Last Name</td>
                        <td>Email</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        if($result->num_rows>0){
                            while($row = $result->fetch_assoc()){
                    ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['firstname']; ?></td>
                                    <td><?php echo $row['lastname']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><a href="update.php?id=<?php echo $row['id']; ?>">Edit</a>&nbsp;<a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                                </tr>
                    <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>