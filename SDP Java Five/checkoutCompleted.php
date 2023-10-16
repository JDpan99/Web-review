<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Style\style.css">
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/5787/5787016.png">
    <title>Done | Restaurant Java</title>

</head>
<body>
    <?php

    include("connection.php");

        $order_num = 0;
        $sql_check = "SELECT * FROM payment_t";
        $result_check = $connection->query($sql_check);
        $order_num += $result_check->num_rows;// New order number

        $upd_sta = "UPDATE order_t SET order_status = 'preparing' WHERE order_no ='$order_num'"; 

        if (!mysqli_query($connection,$upd_sta)) {
            die('Error:' . mysqli_error($connection));
        }

    mysqli_close($connection);

    ?>
    
    <div class="grid">

        <div class="left-col">
        
        </div>
        <div class="right-col" style="height: 1000px;">
            <p style="padding: 50px; font-size: 48px; text-align: center;">Payment done</p>
            <p style="padding: 50px; font-size: 76px; text-align: center;">Order No</p>
            <p style="padding: 50px; font-size: 76px; text-align: center;"><?php echo $order_num ?></p>

            <div class="right-col-action">
                <a href="userHome.html"><button>DONE</button></a>
            </div>          
        </div>

    </div>

    <div class="clearfix"></div>

    <div>
        <footer>
            <p>Software Development Project - MAY - 2023</p>
            <p>APU - UCDF2109ICT(SE) - JAVA FIVE GROUP</p>
        </footer>
    </div>

</body>
</html>