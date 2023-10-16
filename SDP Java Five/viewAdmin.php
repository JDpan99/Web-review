<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Style\style.css">
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/5787/5787016.png">
    <title>Admin - View Admin | Restaurant Java</title>
    
</head>
<body>

    <?php
    include("connection.php");
    $result = mysqli_query($connection, "SELECT * FROM ADMIN_T");
    ?>

    <div class="grid">
        <div class="left-col-admin">

            <div class="left-col-admin-list">
                <img src="images\Java Burger logo.png" alt="">
                <ul>
                    <li><button type="submit" onclick="window.location.href='viewFood.php'">View Food</button></li><br>
                    <li><button type="submit" onclick="window.location.href='viewPayment.php'">View Payment</button></li><br>
                    <li><button type="submit" onclick="window.location.href='viewAdmin.php'">Manage Admin</button></li><br>
                    <li><button type="submit" onclick="window.location.href='viewOwner.php'">Manage Owner</button></li><br>
                    <li><button type="submit" onclick="window.location.href='viewOrder.php'">View Order</button></li><br>
                </ul>
            </div>
            
        </div>

        <div class="right-col-admin">

            <div class="right-col-admin-bar">
                <h3>Restaurant Java Management System</h3>
                <p>Administration Portal</p><br>
            
                <input type="submit" value="Logout">
            </div>

            <div class="right-col-admin-list">
                <h1>Restaurant Java - ADMIN STAFFS</h1>
                <table width = "50%">
                    <tr bgcolor="#ffb801">
                        <td>Admin ID</td>
                        <td>Admin First Name</td>
                        <td>Admin Last Name</td>
                        <td>Admin Email</td>
                        <td>Admin Phone Number</td>
                        <td>Admin Home Address</td>
                        <td>Admin PASSWORD</td>
                        <td>Edit</td>
                        <td>Delete</td>
                    </tr>

                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr bgcolor=\"#d9d9d9\">";

                        echo "<td>";
                        echo $row['adm_id'];
                        echo "</td>";
                        
                        echo "<td>";
                        echo $row['adm_fname'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['adm_lname'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['adm_email'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['adm_phone'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['adm_address'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['adm_password'];
                        echo "</td>";

                        echo "<td><a href=\"editAdmin.php?adm_id="; //edit.php will be created in Lab 8
                        echo $row['adm_id'];
                        echo "\">Edit</a></td>";

                        echo "<td><a href=\"deleteAdmin.php?adm_id="; //hyperlink to delete.php page with ‘id’ parameter
                        echo $row['adm_id'];
                        echo "\" onClick=\"return confirm('Delete "; //JavaScript to confirm the deletion of the record
                        echo $row['adm_fname'];
                        echo " details?');\">Delete</a></td></tr>";

                    }

                    mysqli_close($connection);

                    ?>

                </table>
                <br>
                <button onclick="window.location.href='adminAddAdmin.html'">Add Admin</button>
            </div>
        </div>
    </div>    
</body>
</html>