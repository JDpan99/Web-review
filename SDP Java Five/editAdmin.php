<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Edit Admin | Restaurant Java</title>
    <link rel="stylesheet" type="text/css" href="Style\style.css">
    <script src="javascript.js"></script>
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/5787/5787016.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div>

        <?php
        include("connection.php");
        if (isset($_GET['adm_id'])) {
            $adm_id = mysqli_real_escape_string($connection, $_GET['adm_id']);
            $sql = "SELECT * FROM ADMIN_T WHERE adm_id = '$adm_id'";
            $result = mysqli_query($connection, $sql);
            while($row = mysqli_fetch_array($result)){

        
        ?>

        <div class="admin-insert-bar">
        </div>
        <div class="admin-insert-bar2">
        </div>
        <div class="admin-insert">

            <form action="updateAdmin.php" method="post" enctype="multipart/form-data">
                <h1>Edit Admin</h1>
                <label>Admin ID: </label>
                <input type="text" name="adminid" readonly value="<?php echo $row['adm_id'] ?>">
                <br><br>

                <label>Admin First Name: </label>
                <input type="text" name="adminfname" required="required" value="<?php echo $row['adm_fname'] ?>">
                <br><br>

                <label>Admin Last Name: </label>
                <input type="text" name="adminlname" required="required" value="<?php echo $row['adm_lname'] ?>">
                <br><br>

                <label>Admin Email: </label>
                <input type="text" name="adminemail" required="required" value="<?php echo $row['adm_email'] ?>">
                <br><br>

                <label>Admin Phone Number: </label>
                <input type="text" name="adminphone" required="required" value="<?php echo $row['adm_phone'] ?>">
                <br><br>

                <label>Admin Home Address: </label>
                <input type="text" name="adminaddress" required="required" value="<?php echo $row['adm_address'] ?>">
                <br><br>

                <label>Admin PASSWORD: </label>
                <input type="text" name="adminpassword" required="required" value="<?php echo $row['adm_password'] ?>">
                <br><br>
                
                <input type="submit" value="Edit Admin">
                <button onclick="window.location.href='viewAdmin.php'">Cancel</button>
            </form>
        </div>            
        <?php
        }
        }
        mysqli_close($connection);
        ?>

    </div>
</body>
</html>