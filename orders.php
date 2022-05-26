<?php 

include("includes/db.php");
session_start();
if(isset($_SESSION['message'])){




if(isset($_GET['user_id'])){
    
    $user_id = $_GET['user_id'];
    


$user_id = $_POST['user_id'];

$status = "pending";

$invoice_number = mt_rand();

$select_cart = "select * from cart where user_id='$user_id'";

$run_cart = mysqli_query($con,$select_cart);

while($row_cart = mysqli_fetch_array($run_cart)){
    
    $p_id = $row_cart['p_id'];
    
    $qty = $row_cart['qty'];
    
    $size = $row_cart['size'];
    $invoice_number = $row_cart['invoice_number'];
    
    $get_products = "select * from products where p_id='$p_id'";
    
    $run_products = mysqli_query($con,$get_products);
    
    while($row_products = mysqli_fetch_array($run_products)){
        
        $sub_total = $row_products['product_price']*$qty;
        
        $insert_customer_order = "INSERT into customer_orders set 
            user_id='$user_id',
            due_amount='$sub_total',
            invoice_number='$invoice_number',
            qty='$qty',
            size='$size',
            order_date=NOW(),
            order_status='$status'
        ";
        
        $run_customer_order = mysqli_query($con,$insert_customer_order);
        
        
        $delete_cart = "delete * from cart where user_id='$user_id'";
        
        $run_delete = mysqli_query($con,$delete_cart);
        
        echo "<script>alert('Your orders has been submitted, Thanks')</script>";
        
        echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
        
    }
}
    
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <H1>Heloo</H1>
</body>
</html>