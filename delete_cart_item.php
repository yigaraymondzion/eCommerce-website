<?php 
    
 include('includes/db.php');

    if(isset($_GET['p_id'])){
        
        $delete_id = $_GET['p_id'];
        
        $delete_pro = "DELETE FROM cart WHERE p_id='$delete_id'";
        
        $run_delete = mysqli_query($con,$delete_pro);
        
        if($run_delete){
            
            echo "<script>alert('One of your item has been Removed from your cart')</script>";
            
            echo "<script>window.open('cart.php','_self')</script>";
            
        }
        
    }

?>
