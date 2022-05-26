<?php 
    
    include('../includes/db.php');

?>

<?php 

    if(isset($_GET['m_cat_id'])){
        
        $m_cat_id = $_GET['m_cat_id'];
        
        $delete_cat = "delete from main_categories where m_cat_id='$m_cat_id'";
        
        $run_delete = mysqli_query($con,$delete_cat);
        
        if($run_delete){
            
            echo "<script>alert('One of Your Category Has Been Deleted')</script>";
            
            echo "<script>window.open('view_M_category.php','_self')</script>";
            
        }
        
    }

?>
