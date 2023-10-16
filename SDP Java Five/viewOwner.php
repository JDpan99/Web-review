<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Style\style.css">
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/5787/5787016.png">
    <title>Admin - View Owner | Restaurant Java</title>

    
</head>
<body>

    <?php
    include("connection.php");
    $result = mysqli_query($connection, "SELECT * FROM OWNER_T");
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
                <h1>Restaurant Java - OWNER LIST</h1>
                <table width = "50%">
                    <tr bgcolor="#ffb801">
                        <td>Owner ID</td>
                        <td>Owner Name</td>
                        <td>Edit</td>
                        <td>Delete</td>
                    </tr>

                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr bgcolor=\"#d9d9d9\">";

                        echo "<td>";
                        echo $row['own_id'];
                        echo "</td>";
                        
                        echo "<td>";
                        echo $row['own_name'];
                        echo "</td>";

                        echo "<td><a href=\"editOwner.php?own_id="; //edit.php will be created in Lab 8
                        echo $row['own_id'];
                        echo "\">Edit</a></td>";

                        echo "<td><a href=\"deleteOwner.php?own_id="; //hyperlink to delete.php page with ‘id’ parameter
                        echo $row['own_id'];
                        echo "\" onClick=\"return confirm('Delete "; //JavaScript to confirm the deletion of the record
                        echo $row['own_name'];
                        echo " details?');\">Delete</a></td></tr>";

                    }

                    mysqli_close($connection);

                    ?>

                </table>
                <br>
                <button onclick="window.location.href='adminAddOwner.html'">Add Owner</button>
            </div>
        </div>    
    </div>
</body>
</html>