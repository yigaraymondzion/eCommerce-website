<?php    
    include("includes/header.php");
    require_once('function/function.php');
    if(isset($_SESSION['message'])){
        ?>
            <!-- Shop Cart Section Begin -->
            <section class="shop-cart spad">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="shop__cart__table">
                                <h1>Shopping Cart</h1><br>
                                    <?php 
                                    
                                        $user_id = $_SESSION['user_id'];
                                        
                                        $select_cart = "select * from cart where user_id='$user_id'";
                                        
                                        $run_cart = mysqli_query($con,$select_cart);
                                        
                                        $count = mysqli_num_rows($run_cart);
                                    
                                    ?>
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Size</th>
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

                                            $_SESSION['run_product'] = $run_products;
                                            
                                            while($row_products = mysqli_fetch_array($run_products)){
                                                
                                                $product_title = $row_products['product_title'];
                                                
                                                $p_img1 = $row_products['p_img1'];
                                                
                                                $product_price = $row_products['product_price'];
                                                
                                                $sub_total = $row_products['product_price']*$qty;
                                                
                                                $total += $sub_total;

                                                $_SESSION['product_title'] = $row_products['product_title'];
                                                $_SESSION['product_price'] = $row_products['product_price'];

                                                
                                                
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
                                            <td class="cart__price">Rs. <?php echo $product_price;?></td>
                                            <td class="cart__quantity">
                                                <div class="qty_box">
                                                    <p name="qty" style="color:red"><?php echo $qty?></p> 
                                                </div>
                                            </td>
                                            <td class="cart__quantity">
                                                <div class="qty_box">
                                                    <p name="qty" style="color:red"><?php echo $size?></p> 
                                                </div>
                                            </td>
                                            <td class="cart__total">Rs. <?php echo $sub_total;?></td>
                                            
                                                <td class="cart__close">
                                                    <a href="delete_cart_item.php?p_id=<?php echo $p_id;?>">
                                                        <span class="icon_close"></span>
                                                    </a>
                                                </td>
                                            
                                            
                                        </tr>
                                        
                                        <?php } } ?>
                                        
                                    </tbody>
                                </table>
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
                    <form action="?user=<?php echo $user_id; $product_title; $product_price;?> " method="POST">
                        <div class="row position_proceed">
                            <div class="col-lg-8 offset-lg-2">
                                <div class="cart__total__procced">
                                    <h6>Cart total</h6>
                                    <ul>
                                        <li>Total <span>Rs. <?php echo $total;?></span></li>
                                    </ul>
                                    
                                    <button type="submit" name="checkout" class="primary-btn btn-primary col-lg-8 offset-lg-2">Proceed To Checkount</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </section>
            <!-- Shop Cart Section End -->
        <?php

    }
?>

   <?php 
    
    include("includes/footer.php");
    
    ?>
    
    <?php
        if(isset($_POST['checkout']))
        {     
            echo "<script>window.open('checkout.php','_self')</script>";
        }
    ?>
    
