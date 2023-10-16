<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order | Restaurant Java</title>
    <link rel="stylesheet" type="text/css" href="Style\style.css">
    <script src="javascript.js"></script>
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/5787/5787016.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="grid">
        <?php
        $search = "";
        if (isset($_GET['search_keyword'])) {
            if (($_GET['search_keyword']) == "All") {
                $search = "";
            } else {
                $search = $_GET['search_keyword'];
            }
        }
        ?>
        <div class="left-col">
            <form method="get">
                <div>
                    <ul>
                        <li><button type="submit" name="search_keyword" value="All" class="submit-button"><img src="images\burger.jpg"><br>ALL</button></li>
                        <li><button type="submit" name="search_keyword" value="Burgers" ><img src="images\burger.jpg"><br>Burgers</button></li>
                        <li><button type="submit" name="search_keyword" value="Sides"><img src="images\fries.webp"><br>Sides</button></li>
                        <li><button type="submit" name="search_keyword" value="Beverages"><img src="images\coke.jpg"><br>Beverages</button></li>
                        <li><button type="submit" name="search_keyword" value="Desserts"><img src="images\ice-cream.jpg"><br>Desserts</button></li>
                    </ul> 
                </div>
            </form>
        </div>

        <?php
        include("connection.php");
        $result = mysqli_query($connection, "SELECT * FROM FOOD_T WHERE food_category LIKE '%$search%'");
        ?>
        <div class="right-col">
            
            <?php
            while ($row = mysqli_fetch_array($result)) {
            
            ?>
            
            <div class="foodDisplay">
                <form action="addToCart.php" method="post">
                    
                    <input type="hidden" name='uploadimage' value="<?php echo $row["food_image"]?>">
                    <input type="hidden" name='foodid' value="<?php echo $row["food_id"]?>">
                    <input type="hidden" name='foodname' value="<?php echo $row["food_name"]?>">
                    <input type="hidden" name='foodcategory' value="<?php echo $row["food_category"]?>">
                    <input type="hidden" name='foodprice' value="<?php echo $row["food_price"]?>">
                    
                    <div class="foodDisplay-item">
                        <div class="foodDisplay-img">
                            <img src="images/<?php echo $row["food_image"]; ?>" width = "200px" height ="160px"><br>
                        </div>
                        <p><?php echo $row['food_id'] ?></p>
                        <b><?php echo $row['food_name'] ?></b>
                        <p><?php echo $row['food_category'] ?></p>
                        <p>RM <?php echo $row['food_price'] ?></p>

                        <input type="text" name="foodquantity" size="2" value="1" maxlength="2">
                        <input type="submit" value="Add to cart">
                        <br><br>

                    </div>
                </form>
            </div>
            
            <?php
            }
            mysqli_close($connection);
            ?>
            <hr>
            <div class="right-col-action">
                <a href="userViewCart.php"><button style="background-color:#ffb801;">My cart</button></a>
                <a href="deleteCart.php"><button>Start Over</button></a>
            </div>

        </div>
    </div>

    <div class="clearfix"></div>

    <div>
        <footer>
            <p>Software Development Project - MAY - 2023</p>
            <p>APU - UCDF2109ICT(SE) - JAVA FIVE GROUP</p>
        </footer>
    </div>


</body>
</html>