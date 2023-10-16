<?php

//FAILED CODE NON USABLE

/*include("connection.php");

$food_name = intval($_GET['food_name']);

$result = mysqli_query($connection,"DELETE FROM FOOD_T WHERE food_name = $food_name");

mysqli_close($connection);
header('Location: viewFood.php');
*/
///////////////////////////////////////////////////////////

//USABLE CODE
/*
include("connection.php");
if (isset($_GET['food_id'])) {
    // Sanitize and quote the food_name
    $food_id = mysqli_real_escape_string($connection, $_GET['food_id']);

    $sql = "DELETE FROM FOOD_T WHERE food_id = '$food_id'";
    $result = mysqli_query($connection, $sql);
    header('Location: viewFood.php');
}

*/

//ACTUAL CODE BEST PRACTICE
include("connection.php");

if (isset($_GET['food_id'])) {
    // Sanitize and quote the food_name
    $food_id = mysqli_real_escape_string($connection, $_GET['food_id']);

    $sql = "DELETE FROM FOOD_T WHERE food_id = '$food_id'";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        header('Location: viewFood.php');
        exit;
    } else {
        echo "Error deleting food record: " . mysqli_error($connection);
    }
} else {
    echo "Food ID not provided.";
}

mysqli_close($connection);

?>