<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Style\style.css">
    <link rel="icon" type="image/x-icon" href="https://cdn-icons-png.flaticon.com/512/5787/5787016.png">
    <title>Checkout | Restaurant Java</title>
</head>
<body>
    <?php
    include("connection.php");
    $result = mysqli_query($connection, "SELECT * FROM ORDER_T");
    $total = 0;

    while ($row = mysqli_fetch_array($result)) {

        $total+= doubleval($row["ord_total"])*intval($row["ord_quantity"]);
    }

    mysqli_close($connection);
    ?>
    <div class="grid">

        <div class="left-col">
        
        </div>
        <div class="right-col">
            <div class="right-col-pay">
                
                <form action="processPayment.php" method="post">
                    <div class="right-col-payment">
                        <h1>Cart total: RM <?php echo $total ?></h1>
                        <label>Input your payment amount (RM):</label><br><br>
                        <input type="text" name="paymentAmountInput" required="required"><br><br><br>
                        <div class="radio-pay">
                            <input type="radio" name="paymentMethod" value="Cash" id="cash" checked>
                            <label for="cash">Pay by Cash</label><br>

                            <input type="radio" name="paymentMethod" value="Card" id="card">
                            <label for="card">Pay by Credit / Debit Card</label><br>
                        </div>
                    </div>
                    <div class="right-col-action">
                        <input type="submit" name="paySubmit" value="Place Order" style="background-color:#ffb801;">
                        
                    </div>    

                </form>

                <div class="right-col-action">
                    <a href="userViewCart.php"><button>Back to My Cart</button></a>
                </div>

            </div>

            <div style="height:800px;">

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