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
        <title>View features</title>
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
                                        
                                        <i class="fa fa-dashboard"></i> Dashboard / View Feature
                                        
                                    </li><!-- active finish -->
                                </ol><!-- breadcrumb finish -->
                            </div><!-- col-lg-12 finish -->
                        </div><!-- row 1 finish -->

                        <div class="row"><!-- row 2 begin -->
                            <div class="col-lg-12"><!-- col-lg-12 begin -->
                                <div class="panel panel-default"><!-- panel panel-default begin -->
                                    <div class="panel-heading"><!-- panel-heading begin -->
                                    <h3 class="panel-title"><!-- panel-title begin -->
                                    
                                        <i class="fa fa-tags"></i>  View Feature
                                        
                                    </h3><!-- panel-title finish --> 
                                    </div><!-- panel-heading finish -->
                                    
                                    <div class="panel-body"><!-- panel-body begin -->
                                        <div class="table-responsive"><!-- table-responsive begin -->
                                            <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                                                
                                                <thead><!-- thead begin -->
                                                    <tr><!-- tr begin -->
                                                        <th> Feature ID: </th>
                                                        <th> Feature Title: </th>
                                                        <th> Feature Image: </th>
                                                        <th> Feature Delete: </th>
                                                        <th> Feature Edit: </th>
                                                    </tr><!-- tr finish -->
                                                </thead><!-- thead finish -->
                                                
                                                <tbody><!-- tbody begin -->
                                                    
                                                    <?php 
                                
                                                        $i=0;
                                                    
                                                        $get_pro = "select * from features";
                                                        
                                                        $run_pro = mysqli_query($con,$get_pro);
                                
                                                        while($row_pro=mysqli_fetch_array($run_pro)){
                                                            
                                                            $f_id = $row_pro['f_id'];
                                                            
                                                            $f_title = $row_pro['f_title'];
                                                            
                                                            $f_img = $row_pro['f_img'];
                                                            
                                                            $i++;
                                                    
                                                    ?>
                                                    
                                                    <tr><!-- tr begin -->
                                                        <td> <?php echo $i; ?> </td>
                                                        <td> <?php echo $f_title; ?> </td>
                                                        <td> <img src="Feature_images/<?php echo $f_img; ?>" width="60" height="60"></td>
                                                        
                                                        <td> 
                                                            
                                                            <a href="delete_feature.php?f_id=<?php echo $f_id; ?>">
                                                            
                                                                <i class="fa fa-trash-o"></i> Delete
                                                            
                                                            </a> 
                                                            
                                                        </td>
                                                        <td> 
                                                            
                                                            <a href="edit_feature.php?f_id=<?php echo $f_id; ?>">
                                                            
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
