<?php

include("connection.php");

$sql = "INSERT INTO admin_t (adm_id, adm_fname, adm_lname, adm_email, adm_phone, adm_address, adm_password) 
VALUES 
('$_POST[adminid]', '$_POST[adminfname]', '$_POST[adminlname]', '$_POST[adminemail]', '$_POST[adminphone]', '$_POST[adminaddress]', '$_POST[adminpassword]')";

    if (!mysqli_query($connection, $sql)) {
        die('Error: ' . mysqli_error($connection));
    }else {
        echo '<script>alert("1 admin record added!");
        window.location.href = "adminAddAdmin.html";
        </script>';
    }

?>