<?php 

   
    include("includes/header.php");
    require_once('function/function.php');
?>
       <!-- Shop Cart Section Begin -->
       <section class="shop-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shop__cart__table">
                        <h1>Your Order List</h1><br>
                            <?php 
                            
                                $ip_add = getRealIpUser();
                                
                                $select_cart = "select * from cart where ip_add='$ip_add'";
                                
                                $run_cart = mysqli_query($con,$select_cart);
                                
                                $count = mysqli_num_rows($run_cart);
                            
                            ?>
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                   
                                   $total = 0;
                                   
                                   while($row_cart = mysqli_fetch_array($run_cart)){
                                       
                                     $p_id = $row_cart['p_id'];
                                       
                                     $size = $row_cart['size'];
                                       
                                     $qty = $row_cart['qty'];
                                       
                                       $get_products = "select * from products where p_id='$p_id'";
                                       
                                       $run_products = mysqli_query($con,$get_products);
                                       
                                       while($row_products = mysqli_fetch_array($run_products)){
                                           
                                           $product_title = $row_products['product_title'];
                                           
                                           $p_img1 = $row_products['p_img1'];
                                           
                                           $only_price = $row_products['product_price'];
                                           
                                           $sub_total = $row_products['product_price']*$qty;
                                           
                                           $total += $sub_total;
                                           
                                   ?>
                                   
                                   
                                <tr>
                                    <td class="cart__product__item">
                                        <img src="admin_area/product_images/<?php echo $p_img1; ?>" alt="" width="100px">
                                        <div class="cart__product__item__title">
                                            <h6><?php echo $product_title;?></h6>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="cart__price">$ <?php echo $only_price;?></td>
                                    <td class="cart__quantity">
                                        <div class="qty_box">
                                            <p name="qty" style="color:red"><?php echo $qty?></p> 
                                        </div>
                                    </td>
                                    <td class="cart__total">$ <?php echo $sub_total;?></td>
                                    
                                        
                                    
                                    
                                </tr>
                                   
                                   <?php } } ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <div class="row position_proceed">
                <div class="col-lg-8 offset-lg-2">
                    <div class="cart__total__procced">
                        <h6>Total Bill Amount</h6>
                        <ul>
                            <li>Total <span>$ <?php echo $total;?></span></li>
                        </ul>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn">
                        <a href="home.php">Continue Shopping</a>
                    </div>
                </div>
                <!--
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="cart__btn update__btn">
                        <a href="update_cart.php?qty=<php echo $qty?>">
                            <span class="icon_loading"></span> Update cart
                        </a>
                    </div>
                </div>-->
            </div>
        </div>
    </section>
    <!-- Shop Cart Section End -->
   <?php 
    
    include("includes/footer.php");
    
    ?>
    
    
    
