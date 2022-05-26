<?php
    include("../includes/db.php");
?>


<?php 

    if(isset($_GET['m_cat_id'])){
        
        $m_cat_id = $_GET['m_cat_id'];
        
        $edit_m_cat_query = "select * from main_categories where m_cat_id='$m_cat_id'";
        
        $run_edit = mysqli_query($con,$edit_m_cat_query);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
        $m_cat_id = $row_edit['m_cat_id'];
        
        $m_cat_title = $row_edit['m_cat_title'];
                
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
                            <div class="row"><!-- row 1 begin -->
                                <div class="col-lg-12"><!-- col-lg-12 begin -->
                                    <ol class="breadcrumb"><!-- breadcrumb begin -->
                                        <li>
                                            
                                            <i class="fa fa-dashboard"></i> Dashboard / Edit Main Category
                                            
                                        </li>
                                    </ol><!-- breadcrumb finish -->
                                </div><!-- col-lg-12 finish -->
                            </div><!-- row 1 finish -->

                            <div class="row"><!-- row 2 begin -->
                                <div class="col-lg-12"><!-- col-lg-12 begin -->
                                    <div class="panel panel-default"><!-- panel panel-default begin -->
                                        <div class="panel-heading"><!-- panel-heading begin -->
                                            <h3 class="panel-title"><!-- panel-title begin -->
                                            
                                                <i class="fa fa-pencil fa-fw"></i> Edit Main Category
                                            
                                            </h3><!-- panel-title finish -->
                                        </div><!-- panel-heading finish -->
                                        
                                        <div class="panel-body"><!-- panel-body begin -->
                                            <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal begin -->
                                                <div class="form-group"><!-- form-group begin -->
                                                
                                                    <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                                                    
                                                        Mian Category Title 
                                                    
                                                    </label><!-- control-label col-md-3 finish --> 
                                                    
                                                    <div class="col-md-6"><!-- col-md-6 begin -->
                                                    
                                                        <input value=" <?php echo $m_cat_title; ?> " name="m_cat_title" type="text" class="form-control">
                                                    
                                                    </div><!-- col-md-6 finish -->
                                                
                                                </div><!-- form-group finish -->
                                                
                                                
                                                
                                                
                                                
                                                <div class="form-group"><!-- form-group begin -->
                                                
                                                    <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                                                    
                                                    </label><!-- control-label col-md-3 finish --> 
                                                    
                                                    <div class="col-md-6"><!-- col-md-6 begin -->
                                                    
                                                        <input value="Update Product Category" name="update" type="submit" class="form-control btn btn-primary">
                                                    
                                                    </div><!-- col-md-6 finish -->
                                                
                                                </div><!-- form-group finish -->
                                            </form><!-- form-horizontal finish -->
                                        </div><!-- panel-body finish -->
                                        
                                    </div><!-- panel panel-default finish -->
                                </div><!-- col-lg-12 finish -->
                            </div><!-- row 2 finish -->
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

        <script src="js/tinymce/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'textarea'});</script>
    </body>
</html>
<?php  

          if(isset($_POST['update'])){
              
              $m_cat_title = $_POST['m_cat_title'];
              

              
                
                $update_p_cat = "update main_categories set m_cat_title='$m_cat_title' where m_cat_id='$m_cat_id'";
                
                $run_p_cat = mysqli_query($con,$update_p_cat);
                
                if($run_p_cat){
                    
                    echo "<script>alert('Your Product Category Has Been Updated')</script>";
                    
                    echo "<script>window.open('view_M_category.php','_self')</script>";
                    
                

              }
              
          }

?>

