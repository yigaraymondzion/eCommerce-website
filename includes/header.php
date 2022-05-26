<?php
    include('includes/db.php');

    session_start();
   
    require_once('function/function.php');

?>
<?php 
    if(!isset($_SESSION['message'])){

    }
?>
<!doctype html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--style-->
    <link> 
    
    <link rel="stylesheet" href="./styles/header_footer_style.css" type="text/css">
    <link rel="stylesheet" href="./styles/category.css" type="text/css">
    
    <!--<script src="https://apps.elfsight.com/p/platform.js" defer></script>-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    
    <!-- Google Font -->
    
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">

        <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
         
    
    <link rel="stylesheet" href="./styles/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="./styles/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="./styles/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="./styles/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="./styles/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="./styles/slicknav.min.css" type="text/css">

    <link rel="stylesheet" href="pp.scss" />
   
    
   


  <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js">
    

    <title>ALU</title>
        <!-- Start of Async Drift Code -->
            <script>
            "use strict";

            !function() {
            var t = window.driftt = window.drift = window.driftt || [];
            if (!t.init) {
                if (t.invoked) return void (window.console && console.error && console.error("Drift snippet included twice."));
                t.invoked = !0, t.methods = [ "identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on" ], 
                t.factory = function(e) {
                return function() {
                    var n = Array.prototype.slice.call(arguments);
                    return n.unshift(e), t.push(n), t;
                };
                }, t.methods.forEach(function(e) {
                t[e] = t.factory(e);
                }), t.load = function(t) {
                var e = 3e5, n = Math.ceil(new Date() / e) * e, o = document.createElement("script");
                o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + n + "/" + t + ".js";
                var i = document.getElementsByTagName("script")[0];
                i.parentNode.insertBefore(o, i);
                };
            }
            }();
            drift.SNIPPET_VERSION = '0.3.1';
            drift.load('rkn3ggy3eyvc');
            </script>
<!-- End of Async Drift Code -->
    
  </head>
  <body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js"></script>
    
<div class="super_container container-fluid">
    <!-- Header -->
    <header class="header">
        <!-- Top Bar -->
        <div class="top_bar">
            <div class="container">
                <div class="row">
                    <div class="col d-flex flex-row">
                        <div class="top_bar_contact_item">
                            
                            <h4>Welcome to ALU</h4>
                        </div>
                       
                        <div class="top_bar_content ml-auto justify-content-right">
                            
                            <div class="top_bar_user float-right">
                                
                                <!--<div class="float-right"><a href="signup.php" >Register</a></div>
                                <div class="float-right"><a href="login.php" >Sign in</a></div>-->
                                <?php if( isset($_SESSION['message']) && !empty($_SESSION['message']) )
                                    {
                                    ?>
                                        <a href="my_account.php"><div class="user_icon"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918647/user.svg" alt=""></div></a>
                                        <a href="my_orders.php">My Orders</a>
                                        <a href="logout.php">Logout</a>
                                    <?php }else{ ?>
                                        <a href="login.php">Login</a>
                                        <a href="signup.php">Register</a>
                                    <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- Header Main -->
        <div class="header_main">
            <div class="container">
                <div class="row">
                    <!-- Logo -->
                    <div class="col-lg-2 col-sm-3 col-3 order-1">
                        <div class="logo_container">
                            <div class="logo"><a href="home.php">ALU</a></div>
                        </div>
                    </div> <!-- Search -->
                    <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                        <div class="header_search">
                            <div class="header_search_content">
                                <div class="header_search_form_container">
                                    <form action="search.php" class="header_search_form clearfix"> 
                                        <input type="text" required="required" class="header_search_input" placeholder="Search for products..." name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>">
                                        <div class="custom_dropdown" style="display: none;">
                                            
                                        </div> <button type="submit" name="submit" class="header_search_button trans_300" value="search"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918770/search.png" alt=""></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> <!-- Wishlist -->
                    <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                        <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                             <!-- Cart -->
                            <div class="cart">
                                <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                    <div class="cart_icon"><a href="cart.php"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1560918704/cart.png" alt=""></a> 
                                        
                                        <?php

                                            if(isset($_SESSION['user_id']))
                                            {
                                                ?>
                                                    <div class="cart_count"><span><?php echo $count;?></span></div>
                                                <?php
                                            }else{
                                                ?>
                                                    <div class="cart_count"><span>0</span></div>
                                                <?php
                                            }
                                        ?>
                                    
                                    </div>
                                    <div class="cart_content">
                                        <div class="cart_text"><a href="cart.php">Cart</a></div>
                                        <?php
                                            if(isset($_SESSION['user_id']))
                                            {
                                                ?>
                                                    <div class="cart_price">Rs. <?php echo $total;?></div>
                                                <?php
                                            }else{
                                                ?>
                                                   <div class="cart_price">Rs. 0</div>
                                                <?php
                                            }
                                        ?>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- Main Navigation -->
        <nav class="main_nav">
            <div class="container">
                <div >
                    <div >
                        <div class="main_nav_content d-flex flex-row ">
                            <!-- Categories Menu -->
                            <!-- Main Nav Menu -->
                            <div class="main_nav_menu">
                                <ul class="standard_dropdown main_nav_dropdown" style="color: black;">
                                    <li><a href="home.php">Home<i class="fas fa-chevron-down"></i></a></li>
                                    <li class="hassubs" style="color: black;"> <a href="top.php">Top Wear<i class="fas fa-chevron-down"></i></a>
                                        <ul>
                                            <li> 
                                                <a href="formal_shirts.php">Formal Shirts<i class="fas fa-chevron-down"></i></a>
                                            </li>
                                            <li>
                                                <a href="casual_shirt.php">Casual Shirts<i class="fas fa-chevron-down"></i></a>
                                            </li>
                                            
                                            <li>
                                                <a href="blazer.php">Blazers and Coats<i class="fas fa-chevron-down"></i></a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="hassubs" style="color: black;"> <a href="bottom.php">Bottom Wear<i class="fas fa-chevron-down"></i></a>
                                        <ul>
                                            <li> 
                                                <a href="formal_trouser.php">Formal Trousers<i class="fas fa-chevron-down"></i></a>
                                                
                                            </li>
                                            <li>
                                                <a href="casual_trouser.php">Casual Trousers<i class="fas fa-chevron-down"></i></a>
                                            </li>
                                           
                                        </ul>
                                    </li>

                                    <li><a href="suit.php">Suits<i class="fas fa-chevron-down"></i></a></li>
                                   
                                </ul>
                            </div> <!-- Menu Trigger -->
                            <div class="menu_trigger_container ml-auto">
                                <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                                    <div class="menu_burger">
                                        <div class="menu_trigger_text">menu</div>
                                        <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav> <!-- Menu -->
        
    
    </header>
    
</div>
<script src="./javascript/header_footer_js.js"></script> 
<?php
