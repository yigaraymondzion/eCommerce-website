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
        <title>insert products</title>
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
                                            
                                            <i class="fa fa-dashboard"></i> Dashboard / Insert Products
                                            
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
                                                
                                                
                                                
                                                <div class="col-md-8 form-try"><!-- col-md-6 Begin -->
                                                        <label class="col-md-3 control-label"> Product Title </label>
                                                        <input name="product_title" type="text" class="form-control text_box" required>
                                                    
                                                </div><!-- col-md-6 Finish -->
                                                
                                            </div><!-- form-group Finish -->
                                            
                                            
                                            <div class="form-group"><!-- form-group Begin -->
                                                
                                                
                                                
                                                <div class="col-md-8 form-try"><!-- col-md-6 Begin -->
                                                        <label class="col-md-3 control-label">Main Category </label> 
                                                        <select name="m_cat_id" class="form-control"><!-- form-control Begin -->
                                                        
                                                        <option> Select a Category </option>
                                                        
                                                        <?php
                                                                $sql = "SELECT * FROM main_categories";

                                                                $res = mysqli_query($con, $sql);

                                                                $count = mysqli_num_rows($res);

                                                                if($count>0)
                                                                {
                                                                    while($row=mysqli_fetch_assoc($res))
                                                                    {
                                                                        $m_cat_id = $row['m_cat_id'];
                                                                        $m_cat_title = $row['m_cat_title'];

                                                                        ?>
                                                                            <option value="<?php echo $m_cat_id ?>"><?php echo $m_cat_title ?></option>
                                                                            
                                                                        <?php
                                                                    }
                                                                }
                                                                else
                                                                {
                                                                    ?>
                                                                    <option value="0">No category found</option>  
                                                                    <?php
                                                                }
                                                            ?>
                                                        
                                                    </select><!-- form-control Finish -->
                                                    
                                                </div><!-- col-md-6 Finish -->
                                                
                                            </div><!-- form-group Finish -->
                                            
                                            
                                            <div class="form-group"><!-- form-group Begin -->
                                                
                                                
                                                
                                                <div class="col-md-8 form-try"><!-- col-md-6 Begin -->
                                                        <label class="col-md-3 control-label">Sub Category </label> 
                                                        <select name="s_cat_id" class="form-control"><!-- form-control Begin -->
                                                        
                                                        <option selected disabled> Select a Sub Category </option>
                                                        <?php
                                                                $sql = "SELECT * FROM sub_categories";

                                                                $res = mysqli_query($con, $sql);

                                                                $count = mysqli_num_rows($res);

                                                                if($count>0)
                                                                {
                                                                    while($row=mysqli_fetch_assoc($res))
                                                                    {
                                                                        $s_cat_id = $row['s_cat_id'];
                                                                        $s_cat_title = $row['s_cat_title'];

                                                                        ?>
                                                                            <option value="<?php echo $s_cat_id ?>"><?php echo $s_cat_title?></option>
                                                                            
                                                                        <?php
                                                                    }
                                                                }
                                                                else
                                                                {
                                                                    ?>
                                                                    <option value="0">No category found</option>  
                                                                    <?php
                                                                }
                                                            ?>
                                                        
                                                        
                                                    </select><!-- form-control Finish -->
                                                    
                                                </div><!-- col-md-6 Finish -->
                                                
                                            </div><!-- form-group Finish -->
                                            
                                            
                                            
                                            <div class="form-group"><!-- form-group Begin -->
                                                
                                                
                                                
                                                <div class="col-md-8 form-try"><!-- col-md-6 Begin -->
                                                        <label class="col-md-3 control-label"> Product Image 1 </label> 
                                                    <input name="p_img1" type="file" class="form-control" required>
                                                    
                                                </div><!-- col-md-6 Finish -->
                                                
                                            </div><!-- form-group Finish -->
                                            
                                            <div class="form-group"><!-- form-group Begin -->
                                                
                                                
                                                
                                                <div class="col-md-8 form-try"><!-- col-md-6 Begin -->
                                                        <label class="col-md-3 control-label"> Product Image 2 </label> 
                                                    <input name="p_img2" type="file" class="form-control">
                                                    
                                                </div><!-- col-md-6 Finish -->
                                                
                                            </div><!-- form-group Finish -->
                                            
                                            <div class="form-group"><!-- form-group Begin -->
                                                
                                                
                                                
                                                <div class="col-md-8 form-try"><!-- col-md-6 Begin -->
                                                        <label class="col-md-3 control-label"> Product Image 3 </label> 
                                                    <input name="p_img3" type="file" class="form-control form-height-custom">
                                                    
                                                </div><!-- col-md-6 Finish -->
                                                
                                            </div><!-- form-group Finish -->
                                            
                                            <div class="form-group"><!-- form-group Begin -->
                                                
                                                
                                                
                                                <div class="col-md-8 "><!-- col-md-6 Begin -->
                                                        <label class="col-md-3 control-label"> Trending</label> 
                                                        <input name="trending" type="radio" value="Yes">Yes
                                                        <input name="trending" type="radio" value="No">No
                                                    
                                                </div><!-- col-md-6 Finish -->
                                                
                                            </div><!-- form-group Finish -->

                                            
                                            
                                            <div class="form-group"><!-- form-group Begin -->
                                                
                                                
                                                
                                                <div class="col-md-8 form-try"><!-- col-md-6 Begin -->
                                                        <label class="col-md-3 control-label"> Product Price </label> 
                                                    <input name="product_price" type="text" class="form-control" required>
                                                    
                                                </div><!-- col-md-6 Finish -->
                                                
                                            </div><!-- form-group Finish -->
                                            
                                            
                                            <div class="form-group"><!-- form-group Begin -->
                                                
                                                
                                                
                                                <div class="col-md-8 form-try"><!-- col-md-6 Begin -->
                                                    <label class="col-md-3 control-label"> Product Desc </label> 
                                                    <textarea name="product_desc" cols="19" rows="6" class="form-control"></textarea>
                                                    
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
    $p_id = $_POST['p_id'];
    $product_title = $_POST['product_title'];
    $m_cat_id = $_POST['m_cat_id'];
    $s_cat_id = $_POST['s_cat_id'];
 
    $product_price = $_POST['product_price'];
   
    $product_desc = $_POST['product_desc'];
    $trending = $_POST['trending'];
    
    $p_img1 = $_FILES['p_img1']['name'];
    $p_img2 = $_FILES['p_img2']['name'];
    $p_img3 = $_FILES['p_img3']['name'];
    
    $temp_name1 = $_FILES['p_img1']['tmp_name'];
    $temp_name2 = $_FILES['p_img2']['tmp_name'];
    $temp_name3 = $_FILES['p_img3']['tmp_name'];
    
    move_uploaded_file($temp_name1,"product_images/$p_img1");
    move_uploaded_file($temp_name2,"product_images/$p_img2");
    move_uploaded_file($temp_name3,"product_images/$p_img3");
    
    $insert_product = "INSERT into products set 
        p_id ='$p_id' ,
        m_cat_id = '$m_cat_id' ,
        s_cat_id = '$s_cat_id',
        date = NOW() ,
        product_title = '$product_title',
        p_img1 = '$p_img1' ,
        p_img2 = '$p_img2',
        p_img3 = '$p_img3' ,
        trending = '$trending',
        product_price ='$product_price' ,
        product_desc = '$product_desc'
        ";
    
    $run_product = mysqli_query($con,$insert_product);
    
    if($run_product){
        
        echo "<script>alert('Product has been inserted sucessfully')</script>";
        echo "<script>window.open('insert_product.php','_self')</script>";
        
    }
    
}

?>



