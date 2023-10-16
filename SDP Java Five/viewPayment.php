<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Style\style.css">
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/5787/5787016.png">
    <title>Admin - View Food | Restaurant Java</title>
    
</head>
<body>

    <?php
    include("connection.php");
    $result = mysqli_query($connection, "SELECT * FROM PAYMENT_T");
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
                <h1>Restaurant Java - CUSTOMERS PAYMENT</h1>
                <table width = "50%">
                    <tr bgcolor="#ffb801">
                        <td>Payment ID</td>
                        <td>Payment Amount</td>
                        <td>Payment Date</td>
                        <td>Payment Method</td>
                    </tr>

                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr bgcolor=\"#d9d9d9\">";

                        echo "<td>";
                        echo $row['pay_id'];
                        echo "</td>";
                        
                        echo "<td>RM ";
                        echo $row['pay_amount'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['pay_date'];
                        echo "</td>";

                        echo "<td>";
                        echo $row['pay_method'];
                        echo "</td>";

                    }

                    mysqli_close($connection);

                    ?>

                </table>
            </div>
        </div>
    </div>
</body>
</html>