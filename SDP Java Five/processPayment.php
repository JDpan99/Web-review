<?php
include("connection.php");

$result = mysqli_query($connection, "SELECT * FROM ORDER_T");
$total = 0;
date_default_timezone_set("Asia/Kuala_Lumpur");
$date = date('Y-m-d H:i:s');



while ($row = mysqli_fetch_array($result)){

    $total+= doubleval($row["ord_total"])*intval($row["ord_quantity"]);
}
?>  

<?php

if (isset($_POST['paySubmit'])) {

    if (isset($_POST['paymentAmountInput'])){
        
        $paymentAmount = $_POST['paymentAmountInput'];

        if (!is_numeric($paymentAmount)){
            echo '<script> alert("You can only input numeric!");
                window.location.href = "checkout.php";
                </script>';
                die;
        } else {
            $paymentAmount = filter_var($paymentAmount, FILTER_VALIDATE_FLOAT);

            if ($paymentAmount === false){
                echo '<script> alert("Not valid float input!");
                window.location.href = "checkout.php";
                </script>';
                die;
            } else {

                if ($paymentAmount < $total) {
                    echo '<script> alert("Not enough money!");
                    window.location.href = "checkout.php";
                    </script>';
                    die;
                } else if ($paymentAmount > $total){
                    echo '<script> alert("Here are your changes (RM): ' . ($paymentAmount - $total) .'");
                    </script>';
                } if (isset($_POST['paymentMethod'])){

                    $selectedPaymentMethod = $_POST['paymentMethod'];
                    $order_num = 1;
                    $sql_check = "SELECT * FROM payment_t";
                    $result_check = $connection->query($sql_check);
                    $order_num += $result_check->num_rows;// New order number
            
                    if ($selectedPaymentMethod === 'Cash') {
                
                        $sql = "INSERT INTO PAYMENT_T (pay_amount, pay_date, pay_method, fdOrder_no)
                        VALUES
                        ('$total', '$date', '$_POST[paymentMethod]', '$order_num')";
                    
                        if (!mysqli_query($connection,$sql)) {
                            die('Error:' . mysqli_error($connection));
                        }
                        else {
                            echo '<script> alert("Paid by cash!");
                            window.location.href = "checkoutCompleted.php";
                            </script>';
                        }
                    
                    } else if ($selectedPaymentMethod === 'Card') {
                        $sql = "INSERT INTO PAYMENT_T (pay_amount, pay_date, pay_method)
                        VALUES
                        ('$total', '$date', '$_POST[paymentMethod]')";
                    
                        if (!mysqli_query($connection,$sql)) {
                            die('Error:' . mysqli_error($connection));
                        }
                        else {
                            echo '<script> alert("Paid by card!");
                            window.location.href = "checkoutCompleted.php";
                            </script>';
                            
                        }
                    }
            
                }
                
            }
        }
    }

}
// $sql = "DELETE FROM ORDER_T";
// $result = mysqli_query($connection, $sql);



mysqli_close($connection);
?>

