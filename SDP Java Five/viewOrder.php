<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Style\style.css">
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/5787/5787016.png">
    <title>Admin - View Owner | Restaurant Java</title>
    <style>
        .container{
            background-color: grey;
            width: 90%;
            height: auto;
            margin:auto;
            border: 5px  solid #54007B;
            border-radius: 18px;
            color:azure;
            float:left;
        }
        
        h3 {
            font-size:36px;
        }
        /*Product Layer */
        .order {
            margin:10px;
            margin-left:25px;
            float:left;
        }


        #order_details{

            background-color: black;
            color:azure;
            margin-top: 15px;
            width:70%;
            height:auto;
            border-radius: 20px;
            padding:20px 40px;
        }

        label{
            display: inline-block;
            width:100px;
        }

        /*Button type */
        input[type=button]{
            margin:auto;
            background-color: initial;
            background-image: linear-gradient(-180deg, #FF0000, #FF7474);
            border-radius: 25px;
            box-shadow: rgba(0, 0, 0, 0.1) 2px 2px 4px;
            color: #FFFFFF;
            cursor: pointer;
            display: inline-block;
            font-family: system-ui,"Helvetica Neue",Arial,sans-serif;
            line-height: 5px;
            padding: 8px 20px 8px 20px;
            text-align:center;
            text-transform: uppercase;
            text-shadow: 2px 2px 4px #000000;
            font-weight:bold;
            }

        input[type=button]:hover {
        background: #FF0000;
        }
    </style>

    
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
                <h1>Restaurant Java - Order List</h1>
            <?php
                include("connection.php");
                $result = mysqli_query($connection,"SELECT * FROM order_t WHERE order_status = 'preparing'");
                $ready  = mysqli_query($connection,"SELECT * FROM order_t WHERE order_status = 'Ready'");
            ?>

            <?php
                echo '<div class="container">';
                echo '<center> <h3> Preparing</h3></center>';
                while ($row = mysqli_fetch_array($result))
                {   
                    echo '<div class="order">';
                        echo'<div id="order_details">';
                        echo '<p><label> Order No </label> ';
                        echo $row['order_no'];  
                        echo '</p>'; 
                        
                        echo '<label>Product name </label>:<br><b>';
                        echo $row['ord_name'];  
                        echo '</b></p>';  

                        echo '<p><label> Quantity </label>: ';
                        echo $row['ord_quantity'];  
                        echo '</p>'; 
                        

                        echo '<a href ="ready.php?order_No=';
                        echo $row['order_no'];
                        echo '"><input type="button"';
                        echo 'value="Ready"></a>';

                        

                        echo '</div>';


                    echo "</div>";
                }
                

                echo '</div>';
            ?>
            </div>
        </div>    
    </div>
</body>
</html>