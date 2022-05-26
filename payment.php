<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALU Payment Form</title>
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">

    <style>
/**********************************************CSS FOR PAYMENT************************************/
            body {
                background: #f5f5f5
            }

            .rounded {
                border-radius: 1rem
            }

            .nav-pills .nav-link {
                color: #555
            }

            .nav-pills .nav-link.active {
                color: white
            }

            input[type="radio"] {
                margin-right: 5px
            }

            .bold {
                font-weight: bold
            }
    </style>
</head>
<body>
<div class="container py-5">
    <!-- For demo purpose -->
    <div class="row mb-4">
        <div class="col-lg-8 mx-auto text-center">
            <h1 class="display-6">ALU Payment Forms</h1>
        </div>
    </div> <!-- End -->
    <div class="row">
        <div class="col-lg-6 mx-auto">
            <div class="card ">
                <div class="card-header">
                    <div class="bg-white shadow-sm pt-4 pl-2 pr-2 pb-2">
                        <!-- Credit card form tabs -->
                        <ul role="tablist" class="nav bg-light nav-pills rounded nav-fill mb-3">
                            <li class="nav-item"> <a data-toggle="pill" href="#credit-card" class="nav-link active "> <i class="fas fa-credit-card mr-2"></i> Credit Card / Debit Card </a> </li>
                        </ul>
                    </div> <!-- End -->
                    <!-- Credit card form content -->
                    <div class="tab-content">
                        <!-- credit card info-->
                        <div id="credit-card" class="tab-pane fade show active pt-3">
                            <form method="POST">
                                <div class="form-group"> <label for="username">
                                        <h6>Card Owner</h6>
                                    </label> <input type="text" name="username" placeholder="Card Owner Name" required class="form-control ">
                                </div>
                                <div class="form-group"> <label for="cardNumber">
                                        <h6>Card number</h6>
                                    </label>
                                    <div class="input-group"> <input type="number" name="cardNumber" placeholder="Valid card number" class="form-control " required>
                                        <div class="input-group-append"> <span class="input-group-text text-muted"> <i class="fab fa-cc-visa mx-1"></i> <i class="fab fa-cc-mastercard mx-1"></i> <i class="fab fa-cc-amex mx-1"></i> </span> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group"> <label><span class="hidden-xs">
                                                    <h6>Expiration Date</h6>
                                                </span></label>
                                            <div class="input-group"> <input type="number" placeholder="MM" name="" class="form-control" required> <input type="number" placeholder="YY" name="" class="form-control" required> </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group mb-4"> <label data-toggle="tooltip" title="Three digit CV code on the back of your card">
                                                <h6>CVV <i class="fa fa-question-circle d-inline"></i></h6>
                                            </label> <input type="text" required class="form-control"> </div>
                                    </div>
                                </div>
                                <div class="card-footer"> <button type="submit" name="comfirmpay" class="subscribe btn btn-primary btn-block shadow-sm"> Confirm Payment </button>
                            </form>
                        </div>
                    </div> <!-- End -->
                </div>
            </div>
        </div>
    </div>  

</body>
</html>

<?php 

include("includes/db.php");

?>
<?php 
if(isset($_POST['comfirmpay']))
{

        if(isset($_SESSION['user_id'])){

        
            $user_id = $_SESSION['user_id'];
        
            $status = "completed";

            $payment_mode = "Online";
        
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
                    
                    $total = $row_products['product_price']*$qty;

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


}

     ?>
