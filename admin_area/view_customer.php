<?php include('../includes/db.php'); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>View customers</title>
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
                                        
                                        <i class="fa fa-dashboard"></i> Dashboard / View Customers
                                        
                                    </li><!-- active finish -->
                                </ol><!-- breadcrumb finish -->
                            </div><!-- col-lg-12 finish -->
                        </div><!-- row 1 finish -->

                        <div class="row"><!-- row 2 begin -->
                            <div class="col-lg-12"><!-- col-lg-12 begin -->
                                <div class="panel panel-default"><!-- panel panel-default begin -->
                                    <div class="panel-heading"><!-- panel-heading begin -->
                                    <h3 class="panel-title"><!-- panel-title begin -->
                                    
                                        <i class="fa fa-tags"></i>  View Customers
                                        
                                    </h3><!-- panel-title finish --> 
                                    </div><!-- panel-heading finish -->
                                    
                                    <div class="panel-body"><!-- panel-body begin -->
                                        <div class="table-responsive"><!-- table-responsive begin -->
                                            <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                                                
                                                <thead><!-- thead begin -->
                                                    <tr><!-- tr begin -->
                                                        <th> No: </th>
                                                        <th> Name: </th>
                                                        <th> Image: </th>
                                                        <th> E-Mail: </th>
                                                        <th> Country: </th>
                                                        <th> City: </th>
                                                        <th> Address: </th>
                                                        <th> Contact: </th>
                                                        <th> Delete: </th>
                                                    </tr><!-- tr finish -->
                                                </thead><!-- thead finish -->
                                                
                                                <tbody><!-- tbody begin -->
                                                    <?php
                                                        $no=0;

                                                        $sql = "SELECT * FROM user_table where user_role=0";
                                                                    
                                                            $res = mysqli_query($con, $sql);
                                                                           
                                                            while($row = mysqli_fetch_array($res)){
                                                                $no++;
                                                                $user_id = $row['user_id'];
                                                                $user_name = $row['firstname'].' '.$row['lastname'];
                                                                $user_email = $row['email'];
                                                                $country = $row['country'];
                                                                $city = $row['city'];
                                                                $address = $row['address'];
                                                                $phone = $row['phone'];
                                                                    echo "
                                                                        <tr><!-- tr begin -->
                                                                                        <td>$no </td>
                                                                                        <td>$user_name</td>
                                                                                        <td> image</td>
                                                                                        <td> $user_email</td>
                                                                                        <td>$country</td>
                                                                                        <td>$city </td>
                                                                                        <td>$address</td>
                                                                                        <td>$phone</td>
                                                                                    
                                                                                        <td> 
                                                                                            
                                                                                            <a href='delete_user.php?user_id= $user_id'>
                                                                                            
                                                                                                <i class='fa fa-trash-o'>Delete</i> 
                                                                                            
                                                                                            </a> 
                                                                                            
                                                                                        </td>
                                                                                    </tr><!-- tr finish -->
                                                                                ";

                                                                            }

                                                                            
                                                                        ?>
                                                            
                                                        </td>
                                                    </tr><!-- tr finish -->
                                                    
                                                    
                                                    
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
