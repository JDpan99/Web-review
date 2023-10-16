<?php

include("connection.php");

if (isset($_GET['own_id'])) {
    // Sanitize and quote the food_name
    $own_id = mysqli_real_escape_string($connection, $_GET['own_id']);

    $sql = "DELETE FROM OWNER_T WHERE own_id = '$own_id'";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        header('Location: viewOwner.php');
        exit;
    } else {
        echo "Error deleting Owner record: " . mysqli_error($connection);
    }
} else {
    echo "Owner ID not provided.";
}

mysqli_close($connection);

?>