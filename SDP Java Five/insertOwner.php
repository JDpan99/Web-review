<?php

include("connection.php");

    
$sql = "INSERT INTO owner_t (own_id, own_name) VALUES ('$_POST[ownerid]', '$_POST[ownername]')";

if (!mysqli_query($connection, $sql)) {
    die('Error: ' . mysqli_error($connection));
}else {
    echo '<script>alert("1 record added!");
    window.location.href = "adminAddOwner.html";
    </script>';
}

mysqli_close($connection);

?>
