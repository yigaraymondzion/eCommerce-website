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
        <title>insert s categories</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/d616fca11b.js" crossorigin="anonymous"></script>
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
                
                <i class="fa fa-dashboard"></i> Dashboard / Insert Sub Category
                
            </li>
        </ol><!-- breadcrumb finish -->
    </div><!-- col-lg-12 finish -->
</div><!-- row 1 finish -->

<div class="row"><!-- row 2 begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel-heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                
                    <i class="fa fa-money fa-fw"></i> Insert Sub Category
                
                </h3><!-- panel-title finish -->
            </div><!-- panel-heading finish -->
            
            <div class="panel-body"><!-- panel-body begin -->
                <form action="" class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal begin -->
                    <div class="form-group"><!-- form-group begin -->
                    
                         
                        
                        <div class="col-md-8 form-try"><!-- col-md-6 begin -->
                        <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                        
                        Sub Category Title 
                        
                        </label><!-- control-label col-md-3 finish -->
                        
                            <input name="s_cat_title" type="text" class="form-control">
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group finish -->
                    
                    <div class="form-group"><!-- form-group 2 begin -->
                    
                        
                        
                        <div class="col-md-8 "><!-- col-md-6 begin -->
                            <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                            
                            <tr>
                                <td>Choose Main Category</td>
                            </tr>
                            
                            </label><!-- control-label col-md-3 finish --> 

                            <select name="m_cat_title">
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
                                                <option value="<?php echo $m_cat_id ?>"><?php echo $m_cat_title?></option>
                                                
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
                            </select>
                        
                        </div><!-- col-md-6 finish -->
                    
                    </div><!-- form-group 2 finish -->
                    
                    <div class="form-group"><!-- form-group begin -->
                    
                        <div class="col-md-8 form-try"><!-- col-md-6 begin -->
                            <label for="" class="control-label col-md-3"><!-- control-label col-md-3 begin --> 
                            
                            </label><!-- control-label col-md-3 finish --> 
                        
                            <input value="Submit Sub Category" name="submit" type="submit" class="form-control btn btn-primary">
                        
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
    </body>
</html>
<?php
    if(isset($_POST['submit']))
    {
        $s_cat_title = $_POST['s_cat_title'];
        $m_cat_title = $_POST['m_cat_title'];
    
        $sql = "INSERT INTO sub_categories SET
            s_cat_title = '$s_cat_title',
            m_cat_id= '$m_cat_title' 
        ";

        $res = mysqli_query($con, $sql);
        if($res == true)
        {
            echo "<script>alert('New Sub Category Has Been Inserted')</script>";
            echo "<script>window.open('insert_S_category.php','_self')</script>";
        }
        else
        {
            echo "<script>alert('Failed To Inserted')</script>";
            echo "<script>window.open('isert_S_category.php','_self')</script>";
            
        }
    }
?>