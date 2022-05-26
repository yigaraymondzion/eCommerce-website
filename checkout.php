<?php
    include('includes/header.php');
    require_once('function/function.php');
    
?>

<?php
    if(isset($_POST['checkout']))
    {
        
    }else{
        
    }
?>

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Place Your Order</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <form action="checkout.php?user_id=<?php $user_id?>" method="POST" class="checkout__form">
                <div class="row">
                    <div class="col-lg-8">
                       
                        <div class="col-lg-8 center_it">
                            <div class="checkout__order">
                                <h2>Your order</h2>
                                        <div class='checkout__order__product'>
                                            <ul>
                                                <li>
                                                    <span class='top__text'> <h4>Product</h4> </span>
                                                    <span class='top__text__right'> <h4>Total</h4> </span>
                                                </li>
                                                    <?php checkout();?>
                                            </ul>
                                        </div>
                                        <div class="checkout__order__widget">
                                                
                                                    <li style="list-style:none;"><input type="checkbox" name="cod">Cash On Delivery</li>
                                                    <li style="list-style:none;"><input type="checkbox" name="online_pay">Online Payment</li>
                                                    
                                                
                                               
                                        </div>
                                    <button type="submit" name="placeOrder"  class="primary-btn btn-primary col-lg-8 offset-lg-2">Place oder</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
        <!-- Checkout Section End -->
<?php
    include('includes/footer.php');
?>
<?php 

include("includes/db.php");

?>
<?php 
if(isset($_POST['placeOrder']))
{
    if(isset($_POST['cod'])){
        if(isset($_SESSION['user_id'])){

        
            $user_id = $_SESSION['user_id'];
        
            $status = "pending";

            $payment_mode = "COD";
        
            $invoice_number = mt_rand();
        
            $select_cart = "select * from cart where user_id='$user_id'";
        
            $run_cart = mysqli_query($con,$select_cart);
        
            while($row_cart = mysqli_fetch_array($run_cart)){
                
                $p_id = $row_cart['p_id'];
                
                $qty = $row_cart['qty'];
                
                $size = $row_cart['size'];
                
                $get_products = "SELECT * from products where p_id='$p_id'";
                
                $run_products = mysqli_query($con,$get_products);
                
                while($row_products = mysqli_fetch_array($run_products)){
                    
                    $sub_total = $row_products['product_price']*$qty;
                    
                    $insert_payment = "INSERT into payment set 
                    user_id='$user_id',
                    p_id = '$p_id',
                  
                    amount='$total',
                    invoice_no='$invoice_number',
                    payment_mode = '$payment_mode',
                    payment_date=NOW(),
                    payment_status='$status'
                    ";
                    $run_insert_payment = mysqli_query($con,$insert_payment);

                    $sql = "INSERT into customer_orders set 
                            user_id='$user_id',
                            p_id = '$p_id',
                            due_amount='$total',
                            invoice_number='$invoice_number',
                            qty='$qty',
                            size='$size',
                            order_date=NOW(),
                            order_status='$status'
                            ";
                    $run_customer_order = mysqli_query($con,$sql);
                    
                    $delete_cart = "delete from cart where user_id='$user_id'";
                    
                    $run_delete = mysqli_query($con,$delete_cart);
                    
                    echo "<script>alert('Your orders has been submitted, Thanks')</script>";
                    
                    echo "<script>window.open('my_orders.php','_self')</script>";
                }
            }
        }
    }else if(isset($_POST['online_pay'])){
            echo "<script>window.open('payment.php','_self')</script>";
        }
    
    else{
        echo "<script>alert('please select a payment mode')</script>";
    }

}


     ?>

