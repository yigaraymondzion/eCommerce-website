<?php 
    
 include('../includes/db.php');

    if(isset($_GET['user_id'])){
        
        $delete_id = $_GET['user_id'];
        
        $delete_user= "DELETE FROM user_table WHERE user_id='$delete_id'";
        
        $run_delete = mysqli_query($con,$delete_user);
        
        if($run_delete){
            
            echo "<script>alert('Admin has been Deleted')</script>";
            
            echo "<script>window.open('view_admin.php','_self')</script>";
            
        }
        
    }

?>
