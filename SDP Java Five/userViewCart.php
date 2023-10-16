<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Style\style.css">
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/5787/5787016.png">
    <title>Cart | Restaurant Java</title>
</head>
<body>
    <div class="grid">
    
        <?php
            include("connection.php");
            $order_no = 1;
            $createOrderNo = mysqli_query($connection,"SELECT * FROM payment_t");
            $order_no += $createOrderNo->num_rows;
            $result = mysqli_query($connection, "SELECT * FROM ORDER_T WHERE order_no ='$order_no'");
        ?>

        <div class="left-col">
        
        </div>

        <div class="right-col">
            <div class="cart-col">
                <h1>My Cart</h1>
                <?php
                    $total = 0;
                        
                    while ($row = mysqli_fetch_array($result)){
                        
                        echo '<div class="cartItems">';
                            echo '<div>';
                            echo '<img src="images/';
                            echo $row["ord_image"];
                            echo '" width = "100" height ="100"><br>';
                            echo '</div>';

                            echo '<div class=cartItemsDetails"">';
                                echo '<div>';
                                echo '<label>Food Name: </label>';
                                echo $row['ord_name'];
                                echo '</div>';

                                echo '<div>';
                                echo '<label>Quantity: </label>';
                                echo $row['ord_quantity'];
                                echo '</div>';

                                echo '<div>';
                                echo '<label>Net Price: </label>';
                                echo $row['ord_total'];
                                echo '</div>';
                                echo '<br>';
                                echo '<hr>';
                            echo '</div>';
                            
                        echo '</div>';
                        $total+= doubleval($row["ord_total"])*intval($row["ord_quantity"]);
                        
                    }

                    mysqli_close($connection);
                ?>
            </div>

            <hr class="cartDivider">

            <div class="cartTotal">
                <h1>Cart total: RM <?php echo $total ?></h1>
            </div>
            
            <div class="right-col-action">
                <a href="checkout.php"><button style="background-color:#ffb801;">Checkout</button></a>
                <a href="userOrder.php"><button style="background-color:#ffb801;">Go back order more</button></a>
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