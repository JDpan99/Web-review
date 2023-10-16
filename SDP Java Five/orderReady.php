<?php
    include("connection.php");

    $order_no = $_GET['order_No'];
    
    $sql = mysqli_query($connection,"UPDATE order_t SET order_status = 'ready' WHERE order_no = '$order_no'");

    header("Location: viewOrder.php");

?>