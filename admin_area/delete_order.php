<?php 
    
 include('../includes/db.php');

    if(isset($_GET['p_id'])){
        
        $delete_id = $_GET['p_id'];
        
        $delete_pro = "DELETE FROM customer_orders WHERE p_id='$delete_id'";
        
        $run_delete = mysqli_query($con,$delete_pro);
        
        if($run_delete){
            
            echo "<script>alert('order has been Deleted')</script>";
            
            echo "<script>window.open('view_order.php','_self')</script>";
            
        }
        
    }

?>
