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
        <title>View Products</title>
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
                                    <li class="active"><!-- active begin -->
                                        
                                        <i class="fa fa-dashboard"></i> Dashboard / View Products
                                        
                                    </li><!-- active finish -->
                                </ol><!-- breadcrumb finish -->
                            </div><!-- col-lg-12 finish -->
                        </div><!-- row 1 finish -->

                        <div class="row"><!-- row 2 begin -->
                            <div class="col-lg-12"><!-- col-lg-12 begin -->
                                <div class="panel panel-default"><!-- panel panel-default begin -->
                                    <div class="panel-heading"><!-- panel-heading begin -->
                                    <h3 class="panel-title"><!-- panel-title begin -->
                                    
                                        <i class="fa fa-tags"></i>  View Products
                                        
                                    </h3><!-- panel-title finish --> 
                                    </div><!-- panel-heading finish -->
                                    
                                    <div class="panel-body"><!-- panel-body begin -->
                                        <div class="table-responsive"><!-- table-responsive begin -->
                                            <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                                                
                                                <thead><!-- thead begin -->
                                                    <tr><!-- tr begin -->
                                                        <th> Product ID: </th>
                                                        <th> Product Title: </th>
                                                        <th> Product Image: </th>
                                                        <th> Product Price: </th>
                                                      
                                                      
                                                        <th> Active: </th>
                                                        
                                                        <th> Product Date: </th>
                                                        <th> Product Delete: </th>
                                                        <th> Product Edit: </th>
                                                    </tr><!-- tr finish -->
                                                </thead><!-- thead finish -->
                                                
                                                <tbody><!-- tbody begin -->
                                                    
                                                    <?php 
                                
                                                        $i=0;
                                                    
                                                        $get_pro = "select * from products";
                                                        
                                                        $run_pro = mysqli_query($con,$get_pro);
                                
                                                        while($row_pro=mysqli_fetch_array($run_pro)){
                                                            
                                                            $p_id = $row_pro['p_id'];
                                                            
                                                            $pro_title = $row_pro['product_title'];
                                                            
                                                            $pro_img1 = $row_pro['p_img1'];
                                                            
                                                            $pro_price = $row_pro['product_price'];
                                                            
                                                            

                                                            $trending = $row_pro['trending'];
                                                            
                                                            $pro_date = $row_pro['date'];
                                                            
                                                            $i++;
                                                    
                                                    ?>
                                                    
                                                    <tr><!-- tr begin -->
                                                        <td> <?php echo $i; ?> </td>
                                                        <td> <?php echo $pro_title; ?> </td>
                                                        <td> <img src="product_images/<?php echo $pro_img1; ?>" width="60" height="60"></td>
                                                        <td> &#8360;. <?php echo $pro_price; ?> </td>
                                                        
                                                        
                                                        <td> <?php echo $trending; ?></td>
                                                       
                                                        <td> <?php echo $pro_date; ?> </td>
                                                        <td> 
                                                            
                                                            <a href="delete_product.php?p_id=<?php echo $p_id; ?>">
                                                            
                                                                <i class="fa fa-trash-o"></i> Delete
                                                            
                                                            </a> 
                                                            
                                                        </td>
                                                        <td> 
                                                            
                                                            <a href="edit_product.php?p_id=<?php echo $p_id; ?>">
                                                            
                                                                <i class="fa fa-pencil"></i> Edit
                                                            
                                                            </a> 
                                                            
                                                        </td>
                                                    </tr><!-- tr finish -->
                                                    
                                                    <?php } ?>
                                                    
                                                </tbody><!-- tbody finish -->
                                                
                                            </table><!-- table table-striped table-bordered table-hover finish -->
                                        </div><!-- table-responsive finish -->
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
