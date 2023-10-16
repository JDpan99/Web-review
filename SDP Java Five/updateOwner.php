<?php
include("connection.php");

$sql = "UPDATE OWNER_T SET
own_name = '$_POST[ownername]'

WHERE own_id = '$_POST[ownerid]';";

if (mysqli_query($connection, $sql)) {
    mysqli_close($connection);
    header('Location: viewOwner.php');
}
    
?>