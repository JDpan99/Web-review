<?php

include("connection.php");

if (isset($_GET['adm_id'])) {
    // Sanitize and quote the food_name
    $adm_id = mysqli_real_escape_string($connection, $_GET['adm_id']);

    $sql = "DELETE FROM ADMIN_T WHERE adm_id = '$adm_id'";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        header('Location: viewAdmin.php');
        exit;
    } else {
        echo "Error deleting Admin record: " . mysqli_error($connection);
    }
} else {
    echo "Admin ID not provided.";
}

mysqli_close($connection);

?>