<?php
    include("../includes/db.php");
?>

<?php 

    if(isset($_GET['f_id'])){
        
        $f_id = $_GET['f_id'];
        
        $get_p = "select * from features where f_id='$f_id'";
        
        $run_edit = mysqli_query($con,$get_p);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
        $f_id = $row_edit['f_id'];
        
        $f_title = $row_edit['f_title'];
        
        
      
        
        $f_img = $row_edit['f_img'];

        
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Static Navigation - SB Admin</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body>
        
            
            
            <?php include('sidebar.php'); ?>



            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <div class="row"><!-- row Begin -->
                            
                            <div class="col-lg-12"><!-- col-lg-12 Begin -->
                                
                                <ol class="breadcrumb"><!-- breadcrumb Begin -->
                                    
                                    <li class="active"><!-- active Begin -->
                                        
                                        <i class="fa fa-dashboard"></i> Dashboard / Edit Products
                                        
                                    </li><!-- active Finish -->
                                    
                                </ol><!-- breadcrumb Finish -->
                                
                            </div><!-- col-lg-12 Finish -->
                            
                        </div><!-- row Finish -->
                            
                        <div class="row"><!-- row Begin -->
                            
                            <div class="col-lg-12"><!-- col-lg-12 Begin -->
                                
                                <div class="panel panel-default"><!-- panel panel-default Begin -->
                                    
                                <div class="panel-heading"><!-- panel-heading Begin -->
                                    
                                    <h3 class="panel-title"><!-- panel-title Begin -->
                                        
                                        <i class="fa fa-money fa-fw"></i> Insert Features 
                                        
                                    </h3><!-- panel-title Finish -->
                                    
                                </div> <!-- panel-heading Finish -->
                                
                                <div class="panel-body"><!-- panel-body Begin -->
                                    
                                    <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                                        
                                        <div class="form-group"><!-- form-group Begin -->
                                            
                                            <label class="col-md-3 control-label"> Feature Title </label> 
                                            
                                            <div class="col-md-6"><!-- col-md-6 Begin -->
                                                
                                                <input name="f_title" type="text" class="form-control" required value="<?php echo $f_title; ?>">
                                                
                                            </div><!-- col-md-6 Finish -->
                                            
                                        </div><!-- form-group Finish -->
                                        
                                        <div class="form-group"><!-- form-group Begin -->
                                            
                                            <label class="col-md-3 control-label"> Feature Image </label> 
                                            
                                            <div class="col-md-6"><!-- col-md-6 Begin -->
                                                
                                                <input name="f_img" type="file" class="form-control">
                                                
                                                <br>
                                                
                                                <img width="70" height="70" src="Feature_images/<?php echo $f_img; ?>" alt="<?php echo $f_img; ?>">
                                                
                                            </div><!-- col-md-6 Finish -->
                                            
                                        </div><!-- form-group Finish -->
                                        
                                        <div class="form-group"><!-- form-group Begin -->
                                            
                                            <label class="col-md-3 control-label"></label> 
                                            
                                            <div class="col-md-6"><!-- col-md-6 Begin -->
                                                
                                                <input name="update" value="Update Feature" type="submit" class="btn btn-primary form-control">
                                                
                                            </div><!-- col-md-6 Finish -->
                                            
                                        </div><!-- form-group Finish -->
                                        
                                    </form><!-- form-horizontal Finish -->
                                    
                                </div><!-- panel-body Finish -->
                                    
                                </div><!-- canel panel-default Finish -->
                                
                            </div><!-- col-lg-12 Finish -->
                            
                        </div><!-- row Finish -->

                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; www.alu.com 2021</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
                
            </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
   
    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>
</body>
</html>


<?php 

if(isset($_POST['update'])){
    
    
    $f_title = $_POST['f_title'];



 

        $f_img = $_FILES['f_img']['name'];
        
        $temp_name = $_FILES['f_img']['tmp_name'];

        if(empty($f_img1)){

            $f_img = $new_f_img;
            
            }
            
        move_uploaded_file($temp_name,"Feature_images/$f_img1");
    
        
        $update_product = "UPDATE features set 
            f_id='$f_id',
            f_title='$product_title',
            f_img='$p_img1',
            where f_id=$f_id";
        
        $run_product = mysqli_query($con,$update_product);
        
        if($run_product){
            
            echo "<script>alert('Feature has been Updated sucessfully')</script>";
            echo "<script>window.open('view_feature.php','_self')</script>";
            
        }
    
    
}

?>

