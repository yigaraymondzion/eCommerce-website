<?php include('../includes/db.php'); ?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>View orders</title>
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
                                        
                                        <i class="fa fa-dashboard"></i> Dashboard / View Orders
                                        
                                    </li><!-- active finish -->
                                </ol><!-- breadcrumb finish -->
                            </div><!-- col-lg-12 finish -->
                        </div><!-- row 1 finish -->


                        <div class="row"><!-- row 2 begin -->
                            <div class="col-lg-12"><!-- col-lg-12 begin -->
                                <div class="panel panel-default"><!-- panel panel-default begin -->
                                    <div class="panel-heading"><!-- panel-heading begin -->
                                    <h3 class="panel-title"><!-- panel-title begin -->
                                    
                                        <i class="fa fa-tags"></i>  View Orders
                                        
                                    </h3><!-- panel-title finish --> 
                                    </div><!-- panel-heading finish -->
                                    
                                    <div class="panel-body"><!-- panel-body begin -->
                                        <div class="table-responsive"><!-- table-responsive begin -->
                                            <table class="table table-striped table-bordered table-hover"><!-- table table-striped table-bordered table-hover begin -->
                                                
                                                <thead><!-- thead begin -->
                                                    <tr><!-- tr begin -->
                                                        <th> No: </th>
                                                        <th> Customer Email: </th>
                                                        <th> Invoice No: </th>
                                                        <th> Product Name: </th>
                                                        <th> Product Qty: </th>
                                                        <th> Product Size: </th>
                                                        <th> Order Date: </th>
                                                        <th> Due Amount: </th>
                                                        <th> Status: </th>
                                                        <th> Delete: </th>
                                                    </tr><!-- tr finish -->
                                                </thead><!-- thead finish -->
                                                
                                                <tbody><!-- tbody begin -->
                                                    
                                                <?php
                                                    $no = 0;
                                                    
                                                    $sql = "SELECT cod.*,utb.email,pid.product_title FROM ((customer_orders cod INNER JOIN user_table utb ON cod.user_id=utb.user_id) INNER JOIN products pid ON cod.p_id=pid.p_id)";
                                            
                                                    $res = mysqli_query($con, $sql);
                                                    
                                                    while($row = mysqli_fetch_array($res)){
                                                        $no++;
                                                        $p_id = $row['p_id'];
                                                        $user_email = $row['email'];
                                                        $invoice_number = $row['invoice_number'];
                                                        $product_title = $row['product_title'];
                                                        $qty = $row['qty'];
                                                        $size = $row['size'];
                                                        $order_date = $row['order_date'];
                                                        $total_amount = $row['due_amount'];
                                                        $status = $row['order_status'];

                                                        echo "
                                                                <tr><!-- tr begin -->
                                                                <td>$no </td>
                                                                <td>$user_email</td>
                                                                <td> $invoice_number</td>
                                                                <td> $product_title</td>
                                                                <td>$qty</td>
                                                                <td>$size </td>
                                                                <td>$order_date</td>
                                                                <td>$total_amount</td>
                                                                <td>$status</td>
                                                                <td> 
                                                                    
                                                                    <a href='delete_order.php?p_id= $p_id'>
                                                                    
                                                                        <i class='fa fa-trash-o'>Delete</i> 
                                                                    
                                                                    </a> 
                                                                    
                                                                </td>
                                                            </tr><!-- tr finish -->
                                                        ";

                                                    }

                                                    
                                                ?>
                                                    
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
