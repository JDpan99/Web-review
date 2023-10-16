<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Edit Food | Restaurant Java</title>
    <link rel="stylesheet" type="text/css" href="Style\style.css">
    <script src="javascript.js"></script>
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/5787/5787016.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div>

        <?php
        include("connection.php");
        if (isset($_GET['food_id'])) {
            $food_id = mysqli_real_escape_string($connection, $_GET['food_id']);
            $sql = "SELECT * FROM FOOD_T WHERE food_id = '$food_id'";
            $result = mysqli_query($connection, $sql);
            while($row = mysqli_fetch_array($result)){

        
        ?>

        <div class="admin-insert-bar">
            </div>
            <div class="admin-insert-bar2">
            </div>
            <div class="admin-insert">

                <form action="updateFood.php" method="post">
                    <h1>Edit Food</h1>
                    <label>Food ID: </label>
                    <input type="text" name="foodid" readonly value="<?php echo $row['food_id'] ?>">
                    <br><br>

                    <label>Food Name: </label>
                    <input type="text" name="foodname" required="required" value="<?php echo $row['food_name'] ?>">
                    <br><br>

                    <label>Price: </label>
                    <input type="text" name="foodprice" required="required" value="<?php echo $row['food_price'] ?>">
                    <br><br>

                    <label>Category: </label>
                    <input type="text" name="foodcategory" required="required" value="<?php echo $row['food_category'] ?>">
                    <br><br>

                    <label>Food Image: </label>
                    <input type="file" name ="uploadimage" value="<?php echo $row['food_image'] ?>">
                    <br><br>

                    <input type="submit" value="Edit Food">
                    <button onclick="window.location.href='viewFood.php'">Cancel</button>

                </form>
            </div>
        <?php
        }
        }
        mysqli_close($connection);
        ?>
    </div>
</body>
</html>