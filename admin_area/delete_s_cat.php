<?php 
    
    include('../includes/db.php');

?>

<?php 

    if(isset($_GET['s_cat_id'])){
        
        $s_cat_id = $_GET['s_cat_id'];
        
        $delete_cat = "delete from sub_categories where s_cat_id='$s_cat_id'";
        
        $run_delete = mysqli_query($con,$delete_cat);
        
        if($run_delete){
            
            echo "<script>alert('One of Your Category Has Been Deleted')</script>";
            
            echo "<script>window.open('view_S_categories.php','_self')</script>";
            
        }
        
    }

?>
