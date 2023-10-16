<?php
include("connection.php");

$sql = "UPDATE ADMIN_T SET
adm_fname = '$_POST[adminfname]',
adm_lname = '$_POST[adminlname]',
adm_email = '$_POST[adminemail]',
adm_phone = '$_POST[adminphone]',
adm_address = '$_POST[adminaddress]',
adm_password = '$_POST[adminpassword]'

WHERE adm_id = '$_POST[adminid]';";

if (mysqli_query($connection, $sql)) {
    mysqli_close($connection);
    header('Location: viewAdmin.php');
}
    
?>