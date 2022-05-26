<?php include('includes/header.php');?>
<?php 
    if(!isset($_SESSION['message'])){
        echo "<script>window.open('home.php','_self')</script>";
    }
?>
<center><!--  center Begin  -->
    
    <h1> Your Orders </h1>
    
    <p class="lead"> All your orders in one place</p>
    
    <p class="text-muted">
        
        If you have any questions, feel free to <a href="contact.php">Contact Us</a>. Our Customer Service work <strong>24/7</strong>
        
    </p>
    
</center><!--  center Finish  -->


<hr>


<div class="table-responsive"><!--  table-responsive Begin  -->
    
    <table class="table table-bordered table-hover"><!--  table table-bordered table-hover Begin  -->
        
        <thead><!--  thead Begin  -->
            
            <tr><!--  tr Begin  -->
                
                <th> ON: </th>
                <th> Product:</th>
                <th> Amount: </th>
                <th> Invoice No: </th>
                <th> Qty: </th>
                <th> Size: </th>
                <th> Order Date:</th>
                <th> Paid / Unpaid: </th>
                <th> Return</th>
               
                
            </tr><!--  tr Finish  -->
            
        </thead><!--  thead Finish  -->
        
        <tbody><!--  tbody Begin  -->
           
           <?php 
            
            $customer_session = $_SESSION['user_email'];
            
            $get_customer = "select * from user_table where email='$customer_session'";
            
            $run_customer = mysqli_query($con,$get_customer);
            
            $row_customer = mysqli_fetch_array($run_customer);
            
            $user_id = $row_customer['user_id'];
            
            $get_orders = "SELECT c.*,p.product_price, p.p_img1 from customer_orders c, products p where c.p_id=p.p_id AND c.user_id='$user_id'";
            
            $run_orders = mysqli_query($con,$get_orders);
            
            $i = 0;
            
            while($row_orders = mysqli_fetch_array($run_orders)){

                $p_id = $row_orders['p_id'];
                
                $order_id = $row_orders['order_id'];

                $product_img = $row_orders['p_img1'];

                $product_price = $row_orders['product_price'];
                
                $due_amount = $row_orders['due_amount'];
                
                $invoice_number = $row_orders['invoice_number'];
                
                $qty = $row_orders['qty'];

                $sub_total = $product_price*$qty;
                
                $size = $row_orders['size'];
                
                $order_date = substr($row_orders['order_date'],0,11);
                
                $order_status = $row_orders['order_status'];
                
                $i++;
                
                if($order_status=='pending'){
                    
                    $order_status = 'Unpaid';
                    
                }else{
                    
                    $order_status = 'Paid';
                    
                }
            
            ?>
            
            <tr><!--  tr Begin  -->
            <form action="cancel.php?p_id=<?php echo $p_id?>" method="POST" >   
                <th> <?php echo $i; ?> </th>
                <td> <?php echo "<img src='admin_area/product_images/$product_img' alt='' width='100px'>"?></td>
                <td> Rs.<?php echo $sub_total; ?> </td>
                <td> <?php echo $invoice_number; ?> </td>
                <td> <?php echo $qty; ?> </td>
                <td> <?php echo $size; ?> </td>
                <td> <?php echo $order_date; ?> </td>
                <td> <?php echo $order_status; ?> </td>
                <td> <input type="submit" class="btn-primary" class="fa-solid fa-arrows-rotate" value="Cancel Order"></td>
                </form>
                
            </tr><!--  tr Finish  -->
            
            <?php 
        } ?>
            
        </tbody><!--  tbody Finish  -->
        
    </table><!--  table table-bordered table-hover Finish  -->
    
</div><!--  table-responsive Finish  -->

<?php include('includes/footer.php');?>