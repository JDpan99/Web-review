<?php
$connection = mysqli_connect("localhost", "root", "", "restaurant_java_db", "3306");

//check the connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>