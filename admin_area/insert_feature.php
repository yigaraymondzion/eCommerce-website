<?php 
    include('../includes/db.php');
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Insert feature</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/d616fca11b.js" crossorigin="anonymous"></script>
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
                                            
                                            <i class="fa fa-dashboard"></i> Dashboard / Insert Features
                                            
                                        </li><!-- active Finish -->
                                        
                                    </ol><!-- breadcrumb Finish -->
                                    
                                </div><!-- col-lg-12 Finish -->
                                
                            </div><!-- row Finish -->
                                
                            <div class="row"><!-- row Begin -->
                                
                                <div class="col-lg-12"><!-- col-lg-12 Begin -->
                                    
                                    <div class="panel panel-default"><!-- panel panel-default Begin -->
                                        
                                    <div class="panel-heading"><!-- panel-heading Begin -->
                                        
                                        <h3 class="panel-title"><!-- panel-title Begin -->
                                            
                                            <i class="fa fa-money fa-fw"></i> Insert Feature 
                                            
                                        </h3><!-- panel-title Finish -->
                                        
                                    </div> <!-- panel-heading Finish -->
                                    
                                    <div class="panel-body"><!-- panel-body Begin -->
                                        
                                        <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                                            
                                            <div class="form-group"><!-- form-group Begin -->
                                                
                                                
                                                
                                                <div class="col-md-8 form-try"><!-- col-md-6 Begin -->
                                                        <label class="col-md-3 control-label"> Feature Title </label>
                                                        <input name="f_title" type="text" class="form-control text_box" required>
                                                    
                                                </div><!-- col-md-6 Finish -->
                                                
                                            </div><!-- form-group Finish -->
                                            
                                            <div class="form-group"><!-- form-group Begin -->
                                                
                                                
                                                
                                                <div class="col-md-8 "><!-- col-md-6 Begin -->
                                                        <label class="col-md-3 control-label"> Feature Large</label> 
                                                        <input name="large" type="radio" value="Yes">Yes
                                                        <input name="large" type="radio" value="No">No
                                                    
                                                </div><!-- col-md-6 Finish -->
                                                
                                            </div><!-- form-group Finish -->

                                            <div class="form-group"><!-- form-group Begin -->
                                                
                                                
                                                
                                                <div class="col-md-8 form-try"><!-- col-md-6 Begin -->
                                                        <label class="col-md-3 control-label"> Feature Image </label> 
                                                    <input name="f_img" type="file" class="form-control" required>
                                                    
                                                </div><!-- col-md-6 Finish -->
                                                
                                            </div><!-- form-group Finish -->
                                                
                                            

                                            <div class="form-group"><!-- form-group Begin -->
                                                
                                                
                                                
                                                <div class="col-md-8 form-try"><!-- col-md-6 Begin -->
                                                        <label class="col-md-3 control-label"></label>
                                                    <input name="submit" value="Insert Product" type="submit" class="btn btn-primary form-control">
                                                    
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
                            <div class="text-muted">Copyright &copy; Your Website 2021</div>
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
    </body>
</html>
<?php 

if(isset($_POST['submit'])){
    $f_id = $_POST['f_id'];
    $f_title = $_POST['f_title'];
    $large = $_POST['large'];
    
    $f_img = $_FILES['f_img']['name'];
;
    
    $temp_name = $_FILES['f_img']['tmp_name'];

    
    move_uploaded_file($temp_name,"Feature_images/$f_img");

    
    $insert_product = "insert into features (f_id,f_title,f_img,large) values ('$f_id','$f_title','$f_img','$large')";
    
    $run_product = mysqli_query($con,$insert_product);
    
    if($run_product){
        
        echo "<script>alert('Feature has been inserted sucessfully')</script>";
        echo "<script>window.open('insert_feature.php','_self')</script>";
        
    }
    
}

?>



