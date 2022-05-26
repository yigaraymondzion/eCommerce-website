<?php 
    
 include('includes/db.php');

    if(isset($_GET['qty'])){
                                       
        

        $update_qty = $_GET['qty'];
        
        $update = "UPDATE cart set 
            qty='$qty'
            WHERE p_id='$update_qty'";
        
        $run_update = mysqli_query($con,$update);
        
        if($run_update){
            
            echo "<script>alert('Your cart has been updated.')</script>";
            
            echo "<script>window.open('cart.php','_self')</script>";
            
        }
        
    }

?>
