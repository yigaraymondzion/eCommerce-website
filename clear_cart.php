<?php 
    include('includes/db.php');
    session_start();
    $_SESSION['clear'] = session_destroy();
    if( isset($_SESSION['clear'] ))
    {
    
        $delete_pro = "DELETE FROM cart WHERE p_id='$delete_id'";
        
        $run_delete = mysqli_query($con,$delete_pro);
    } 
 ?>
