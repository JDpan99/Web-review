<?php

include("connection.php");

$food_id = $_POST['foodid'];
$foodquantity = $_POST['foodquantity'];

//Add order number
$order_num = 1;
$num_check = "SELECT * FROM payment_t";
$resultroll_check = $connection->query($num_check);
$order_num += $resultroll_check->num_rows;

//Check item exisit
$sql_check = "SELECT * FROM ORDER_T WHERE food_id = '$food_id' AND order_no = '$order_num'";
$result_check = $connection->query($sql_check);

if ($result_check->num_rows > 0) {
    $row = $result_check->fetch_assoc();
    $new_quantity = $row['ord_quantity'] + $foodquantity;
    $update_sql = "UPDATE ORDER_T SET ord_quantity = $new_quantity WHERE food_id = '$food_id' AND order_no = '$order_num'";

    if ($connection->query($update_sql) === TRUE) {
        echo '<script> alert("Quantity Added!");
        window.location.href = "userOrder.php";
        </script>';
    } else {
        echo "Error updating quantity: " . mysqli_error($connection);
    }

} else {
    //Add item to table
    $ord_status = 'waiting for payment';
    $sql = "INSERT INTO ORDER_T (ord_name, ord_quantity, ord_total, ord_image, food_id, order_no, order_status)

    VALUES

    ('$_POST[foodname]', '$_POST[foodquantity]', '$_POST[foodprice]', '$_POST[uploadimage]', '$_POST[foodid]', '$order_num', '$ord_status')";

    if (!mysqli_query($connection,$sql)) {
        die('Error:' . mysqli_error($connection));
    }
    else {
        echo '<script> alert("Item added!");
        window.location.href = "userOrder.php";
        </script>';
    }
}

mysqli_close($connection);

?>