<?php 
    
 include('../includes/db.php');

    if(isset($_GET['f_id'])){
        
        $delete_id = $_GET['f_id'];
        
        $delete_pro = "DELETE FROM features WHERE f_id='$delete_id'";
        
        $run_delete = mysqli_query($con,$delete_pro);
        
        if($run_delete){
            
            echo "<script>alert('One of your feature has been Deleted')</script>";
            
            echo "<script>window.open('view_feature.php','_self')</script>";
            
        }
        
    }

?>
