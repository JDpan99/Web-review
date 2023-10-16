<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Edit Owner | Restaurant Java</title>
    <link rel="stylesheet" type="text/css" href="Style\style.css">
    <script src="javascript.js"></script>
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/5787/5787016.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div>

        <?php
        include("connection.php");
        if (isset($_GET['own_id'])) {
            $own_id = mysqli_real_escape_string($connection, $_GET['own_id']);
            $sql = "SELECT * FROM OWNER_T WHERE own_id = '$own_id'";
            $result = mysqli_query($connection, $sql);
            while($row = mysqli_fetch_array($result)){

        
        ?>

        <div class="admin-insert-bar">
            </div>
            <div class="admin-insert-bar2">
            </div>
            <div class="admin-insert">

                <form action="updateOwner.php" method="post">
                    <h1>Edit Owner</h1>
                    <label>Owner ID: </label>
                    <input type="text" name="ownerid" readonly value="<?php echo $row['own_id'] ?>">
                    <br><br>

                    <label>Owner Name: </label>
                    <input type="text" name="ownername" required="required" value="<?php echo $row['own_name'] ?>">
                    <br><br>

                    <input type="submit" value="Edit Owner">
                    <button onclick="window.location.href='viewOwner.php'">Cancel</button>

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