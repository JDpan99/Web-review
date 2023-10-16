<?php
include("connection.php");

$sql = "UPDATE FOOD_T SET
food_name = '$_POST[foodname]',
food_price = '$_POST[foodprice]',
food_category = '$_POST[foodcategory]',
food_image = '$_POST[uploadimage]'

WHERE food_id = '$_POST[foodid]';";

if (mysqli_query($connection, $sql)) {
    mysqli_close($connection);
    header('Location: viewFood.php');
}
    
?>
