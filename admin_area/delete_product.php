<?php 
    
 include('../includes/db.php');

    if(isset($_GET['p_id'])){
        
        $delete_id = $_GET['p_id'];
        
        $delete_pro = "DELETE FROM products WHERE p_id='$delete_id'";
        
        $run_delete = mysqli_query($con,$delete_pro);
        
        if($run_delete){
            
            echo "<script>alert('One of your product has been Deleted')</script>";
            
            echo "<script>window.open('view_product.php','_self')</script>";
            
        }
        
    }

?>
