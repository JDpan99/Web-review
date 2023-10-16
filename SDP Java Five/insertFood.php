<?php

include("connection.php");

//Set folder, file name and file type
$target_dir = "images/"; // "images/" is from the main source file SDP Java Five.
$target_file = $target_dir . basename($_FILES["uploadimage"]["name"]); //uploadimage is from HTML form <input name ="">

if (move_uploaded_file($_FILES["uploadimage"]["tmp_name"], $target_file)) {
    $file_name = basename($_FILES["uploadimage"]["name"]);
    
    $sql = "INSERT INTO food_t (food_id, food_name, food_price, food_category, food_image) VALUES ('$_POST[foodid]', '$_POST[foodname]', '$_POST[foodprice]', '$_POST[foodcategory]', '$file_name')";

    if (!mysqli_query($connection, $sql)) {
        die('Error: ' . mysqli_error($connection));
    }else {
        echo '<script>alert("1 record added!");
        window.location.href = "adminAddFood.html";
        </script>';
    }
} else {
    echo "Sorry, there was an error uploading your file.";
}

mysqli_close($connection);

?>
