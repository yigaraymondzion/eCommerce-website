<?php
    include("../includes/db.php");
?>

<?php 

    if(isset($_GET['p_id'])){
        
        $p_id = $_GET['p_id'];
        
        $get_p = "select * from products where p_id='$p_id'";
        
        $run_edit = mysqli_query($con,$get_p);
        
        $row_edit = mysqli_fetch_array($run_edit);
        
        $p_id = $row_edit['p_id'];
        
        $p_title = $row_edit['product_title'];
        
        $p_cat = $row_edit['m_cat_id'];
        
        $cat = $row_edit['s_cat_id'];

      
        
        $p_img1 = $row_edit['p_img1'];
        $p_img2 = $row_edit['p_img2'];
        $p_img3 = $row_edit['p_img3'];
        
        $p_price = $row_edit['product_price'];
        
        
        $p_desc = $row_edit['product_desc'];

        $trending = $row_edit['trending'];
        
    }
        

        
      
        
        $get_p_cat = "select * from main_categories where m_cat_id='$p_cat'";
        
        $run_p_cat = mysqli_query($con,$get_p_cat);
        
        $row_p_cat = mysqli_fetch_array($run_p_cat);
        
        $p_cat_title = $row_p_cat['m_cat_title'];
        
        $get_cat = "select * from sub_categories where s_cat_id='$cat'";
        
        $run_cat = mysqli_query($con,$get_cat);
        
        $row_cat = mysqli_fetch_array($run_cat);
        
        $cat_title = $row_cat['s_cat_title'];

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
                                        
                                        <i class="fa fa-money fa-fw"></i> Insert Product 
                                        
                                    </h3><!-- panel-title Finish -->
                                    
                                </div> <!-- panel-heading Finish -->
                                
                                <div class="panel-body"><!-- panel-body Begin -->
                                    
                                    <form method="post" class="form-horizontal" enctype="multipart/form-data"><!-- form-horizontal Begin -->
                                        
                                        <div class="form-group"><!-- form-group Begin -->
                                            
                                            <label class="col-md-3 control-label"> Product Title </label> 
                                            
                                            <div class="col-md-6"><!-- col-md-6 Begin -->
                                                
                                                <input name="product_title" type="text" class="form-control" required value="<?php echo $p_title; ?>">
                                                
                                            </div><!-- col-md-6 Finish -->
                                            
                                        </div><!-- form-group Finish -->
                                        
                                        
                                        
                                        <div class="form-group"><!-- form-group Begin -->
                                            
                                            <label class="col-md-3 control-label"> Main Category </label> 
                                            
                                            <div class="col-md-6"><!-- col-md-6 Begin -->
                                                
                                                <select name="m_cat_id" class="form-control"><!-- form-control Begin -->

                                                    <option disabled value="Select main Category">Select Main Category</option>       
                                                    
                                                    <option value="<?php echo $p_cat; ?>"> <?php echo $p_cat_title; ?> </option>
                                                    
                                                    <?php 
                                                    
                                                    $get_p_cats = "select * from main_categories";
                                                    $run_p_cats = mysqli_query($con,$get_p_cats);
                                                    
                                                    while ($row_p_cats=mysqli_fetch_array($run_p_cats)){
                                                        
                                                        $m_cat_id = $row_p_cats['m_cat_id'];
                                                        $m_cat_title = $row_p_cats['m_cat_title'];
                                                        
                                                        echo "
                                                        
                                                        <option value='$m_cat_id'> $m_cat_title </option>
                                                        
                                                        ";
                                                        
                                                    }
                                                    
                                                    ?>
                                                    
                                                </select><!-- form-control Finish -->
                                                
                                            </div><!-- col-md-6 Finish -->
                                            
                                        </div><!-- form-group Finish -->
                                        
                                        <div class="form-group"><!-- form-group Begin -->
                                            
                                            <label class="col-md-3 control-label"> Sub Category </label> 
                                            
                                            <div class="col-md-6"><!-- col-md-6 Begin -->
                                                
                                                <select name="cat" class="form-control"><!-- form-control Begin -->

                                                    <option disabled value="Select Category">Select Sub Category</option>
                                                    
                                                    <option value="<?php echo $cat; ?>"> <?php echo $cat_title; ?> </option>
                                                    
                                                    <?php 
                                                    
                                                    $get_cat = "select * from sub_categories";
                                                    $run_cat = mysqli_query($con,$get_cat);
                                                    
                                                    while ($row_cat=mysqli_fetch_array($run_cat)){
                                                        
                                                        $s_cat_id = $row_cat['s_cat_id'];
                                                        $s_cat_title = $row_cat['s_cat_title'];
                                                        
                                                        echo "
                                                        
                                                        <option value='$s_cat_id'> $s_cat_title </option>
                                                        
                                                        ";
                                                        
                                                    }
                                                    
                                                    ?>
                                                    
                                                </select><!-- form-control Finish -->
                                                
                                            </div><!-- col-md-6 Finish -->
                                            
                                        </div><!-- form-group Finish -->
                                        
                                        <div class="form-group"><!-- form-group Begin -->
                                            
                                            <label class="col-md-3 control-label"> Product Image 1 </label> 
                                            
                                            <div class="col-md-6"><!-- col-md-6 Begin -->
                                                
                                                <input name="p_img1" type="file" class="form-control">
                                                
                                                <br>
                                                
                                                <img width="70" height="70" src="product_images/<?php echo $p_img1; ?>" alt="<?php echo $p_img1; ?>">
                                                
                                            </div><!-- col-md-6 Finish -->
                                            
                                        </div><!-- form-group Finish -->
                                        
                                        <div class="form-group"><!-- form-group Begin -->
                                            
                                            <label class="col-md-3 control-label"> Product Image 2 </label> 
                                            
                                            <div class="col-md-6"><!-- col-md-6 Begin -->
                                                
                                                <input name="p_img2" type="file" class="form-control">
                                                
                                                <br>
                                                
                                                <img width="70" height="70" src="product_images/<?php echo $p_img2; ?>" alt="<?php echo $p_img2; ?>">
                                                
                                            </div><!-- col-md-6 Finish -->
                                            
                                        </div><!-- form-group Finish -->
                                        
                                        <div class="form-group"><!-- form-group Begin -->
                                            
                                            <label class="col-md-3 control-label"> Product Image 3 </label> 
                                            
                                            <div class="col-md-6"><!-- col-md-6 Begin -->
                                                
                                                <input name="p_img3" type="file" class="form-control form-height-custom">
                                                
                                                <br>
                                                
                                                <img width="70" height="70" src="product_images/<?php echo $p_img3; ?>" alt="<?php echo $p_img3; ?>">
                                                
                                            </div><!-- col-md-6 Finish -->
                                            
                                        </div><!-- form-group Finish -->

                                                <!--Active menu begin -->
                                                    <div class="form-group"><!-- form-group Begin -->
                                                
                                                        <label class="col-md-3 control-label"> Trending Active </label> 
                                                        
                                                        <div class="col-md-6"><!-- col-md-6 Begin -->
                                                            
                                                            <input <?php if($trending=="Yes") {echo "echecked";}?> name="trending" type="radio" value="Yes">Yes
                                                            <input <?php if($trending=="No") {echo "echecked";}?> name="trending" type="radio" value="No">No
                                                            
                                                        </div><!-- col-md-6 Finish -->
                                                
                                                    </div><!-- form-group Finish -->
                                                <!--Active menu end -->
                                        
                                        <div class="form-group"><!-- form-group Begin -->
                                            
                                            <label class="col-md-3 control-label"> Product Price </label> 
                                            
                                            <div class="col-md-6"><!-- col-md-6 Begin -->
                                                
                                                <input name="product_price" type="text" class="form-control" required value="<?php echo $p_price; ?>">
                                                
                                            </div><!-- col-md-6 Finish -->
                                            
                                        </div><!-- form-group Finish -->
                                        
                                        
                                        
                                        <div class="form-group"><!-- form-group Begin -->
                                            
                                            <label class="col-md-3 control-label"> Product Desc </label> 
                                            
                                            <div class="col-md-6"><!-- col-md-6 Begin -->
                                                
                                                <textarea name="product_desc" cols="19" rows="6" class="form-control">
                                                    
                                                    <?php echo $p_desc; ?>
                                                    
                                                </textarea>
                                                
                                            </div><!-- col-md-6 Finish -->
                                            
                                        </div><!-- form-group Finish -->
                                        
                                        <div class="form-group"><!-- form-group Begin -->
                                            
                                            <label class="col-md-3 control-label"></label> 
                                            
                                            <div class="col-md-6"><!-- col-md-6 Begin -->
                                                
                                                <input name="update" value="Update Product" type="submit" class="btn btn-primary form-control">
                                                
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
   
    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>
</body>
</html>


<?php 

if(isset($_POST['update'])){
    
    
    $product_title = $_POST['product_title'];
    $product_cat = $_POST['product_cat'];
    $cat = $_POST['cat'];
    $trending = $_POST['trending'];
    $product_price = $_POST['product_price'];
    
    $product_desc = $_POST['product_desc'];
    

 

        $p_img1 = $_FILES['p_img1']['name'];
        $p_img2 = $_FILES['p_img2']['name'];
        $p_img3 = $_FILES['p_img3']['name'];
        
        $temp_name1 = $_FILES['p_img1']['tmp_name'];
        $temp_name2 = $_FILES['p_img2']['tmp_name'];
        $temp_name3 = $_FILES['p_img3']['tmp_name'];

        if(empty($p_img1)){

            $p_img1 = $new_p_img1;
            
            }
            
            
            if(empty($p_img2)){
            
            $p_img2 = $new_p_img2;
            
            }
            
            if(empty($p_img3)){
            
            $p_img3 = $new_p_img3;
            
            }
        
        move_uploaded_file($temp_name1,"product_images/$p_img1");
        move_uploaded_file($temp_name2,"product_images/$p_img2");
        move_uploaded_file($temp_name3,"product_images/$p_img3");
        
        $update_product = "UPDATE products set 
            m_cat_id='$m_cat_id',
            s_cat_id='$s_cat_id',
            date=NOW(),
            product_title='$product_title',
            p_img1='$p_img1',
            p_img2='$p_img2',
            p_img3='$p_img3',
            product_desc='$product_desc',
            trending='$trending',
            product_price='$product_price' where p_id=$p_id";
        
        $run_product = mysqli_query($con,$update_product);
        
        if($run_product){
            
            echo "<script>alert('Product has been Updated sucessfully')</script>";
            echo "<script>window.open('view_product.php','_self')</script>";
            
        }
    
    
}

?>

