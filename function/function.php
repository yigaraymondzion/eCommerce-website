<?php
  
  $con = mysqli_connect("localhost","root","","alu");
   

    if(isset($_SESSION['message'])){
        
       
   
    
    $user_id = $_SESSION['user_id'];
    
    $total = 0;
    $user_id = $_SESSION['user_id'];
    $select_cart = "select * from cart where user_id='$user_id'";
                                
    $run_cart = mysqli_query($con,$select_cart);
    
    $count = mysqli_num_rows($run_cart);
                                
    while($row_cart = mysqli_fetch_array($run_cart)){
        
      $p_id = $row_cart['p_id'];
        
      $size = $row_cart['size'];
        
      $qty = $row_cart['qty'];
        
        $get_products = "select * from products where p_id='$p_id'";
        
        $run_products = mysqli_query($con,$get_products);
        
        while($row_products = mysqli_fetch_array($run_products)){

            $sub_total = $row_products['product_price']*$qty;
            $total += $sub_total;
           
        }
     }
  
    }else{
            unset($_SESSION['user_id']);
        }

/*-------------------------------function add cart---------------------*/
  function add_cart(){
    
    global $con;
 
    if(isset($_GET['add_cart'])){
         
        $user_id = $_SESSION['user_id'];
        
        $p_id = $_GET['add_cart'];
        
        $qty = $_POST['qty'];
        
        $size = $_POST['size'];

        $add_cart = "select * from cart where user_id='$user_id' AND p_id='$p_id'";
        
        $run_add = mysqli_query($con,$add_cart);
        
        if(mysqli_num_rows($run_add)>0){
            
            echo "<script>alert('This product has already added in cart')</script>";
            echo "<script>window.open('details.php?p_id=$p_id','_self')</script>";
            
        }else{
            
            $query = "INSERT into cart (p_id,user_id,qty,size) values ('$p_id','$user_id','$qty','$size')";
            
            $run_query = mysqli_query($con,$query);
            echo "<script>alert('Product Added To Cart')</script>";
            echo "<script>window.open('cart.php','_self')</script>";
                       
        }
        
    }
    
}

/// finish add_cart functions ///



 /*=========================Get Feature function start==============================*/
 function getfeature(){
    global $con;
    
        $sql = "SELECT * FROM features where large='' OR large='No' limit 1";
                            
         $res = mysqli_query($con, $sql);

        while($row = mysqli_fetch_array($res))
        {
            $f_img = $row['f_img'];

            echo "
                <div class='col-lg-12'>
                    <div class='single-box-item first-box'>
                    <a href='blazer.php'><img src='./admin_area/Feature_images/$f_img' alt=''></i></a>
                                    
                    </div>
                </div>
            ";
        }

                           
}
/*=========================Get Feature function end==============================*/   


/*=========================Get Feature function start==============================*/
function getfeature1(){
    global $con;
        $sql = "SELECT * FROM features where large='YES' limit 1";
                            
         $res = mysqli_query($con, $sql);

        while($row = mysqli_fetch_array($res))
        {
            $f_id = $row['f_id'];
    
           
    
            $f_img = $row['f_img'];

            echo "
                
                    
                  
                        <div class='single-box-item large-box'>
                            
                            <a href='suit.php'><img src='./admin_area/Feature_images/$f_img' alt=''></i></a>
                        </div>
                  
              
            ";
        }

                           
}
function getfeature2(){
    global $con;
        $sql = "SELECT * FROM features where f_id=9";
                            
         $res = mysqli_query($con, $sql);

        while($row = mysqli_fetch_array($res))
        {
            $f_id = $row['f_id'];
    
           
    
            $f_img = $row['f_img'];

            echo "
                
                    
                  
                        <div class='single-box-item large-box'>
                            
                            <a href='formal_shirts.php'><img src='./admin_area/Feature_images/$f_img' alt=''></i></a>
                        </div>
                  
              
            ";
        }

                           
}
/*=========================Get Feature function end==============================*/   


  /*=========================GetTrending function start==============================*/
  function gettrending(){
    global $con;

        
        $sql = "SELECT * FROM products where trending='yes' ORDER BY RAND() LIMIT 4";
                            
         $res = mysqli_query($con, $sql);

        while($row = mysqli_fetch_array($res))
        {
            $p_id = $row['p_id'];
    
            $product_title = $row['product_title'];
    
            $product_price = $row['product_price'];
    
            $p_img1 = $row['p_img1'];
            

            echo "
                <div class='col-lg-3 col-sm-6 mix all dresses bags'>
                    <div class='single-product-item'>
                        <figure>
                            <a href='details.php?p_id=$p_id'><img src='./admin_area/product_images/$p_img1' alt=''></a>
                            
                        </figure>
                        <div class='product-text'>
                            <h6>$product_title</h6>
                            <p>Rs.$product_price</p>
                        </div>
                    </div>
                </div>
            ";
        }

                           
}
/*=========================GetTrending function end==============================*/   


/*=========================GetProduct function start==============================*/
    function getproduct(){
        global $con;
            $sql = "SELECT * FROM products ORDER BY RAND() LIMIT 8";
                                
             $res = mysqli_query($con, $sql);

            while($row = mysqli_fetch_array($res))
            {
                $p_id = $row['p_id'];
        
                $product_title = $row['product_title'];
        
                $product_price = $row['product_price'];
        
                $p_img1 = $row['p_img1'];

                echo "
                    <div class='col-lg-3 col-sm-6 mix all dresses bags'>
                        <div class='single-product-item'>
                            <figure>
                                <a href='details.php?p_id=$p_id'>
                                    <img src='./admin_area/product_images/$p_img1' alt=''>
                                </a>
                                
                            </figure>
                            <div class='product-text'>
                                <h6>
                                    <a href='details.php?pro_id=$p_id'>

                                        $product_title
    
                                    </a>
                                </h6>
                                <p>Rs.$product_price</p>
                            </div>
                        </div>
                    </div>
                ";
            }

                               
    }
/*=========================GetProduct function end==============================*/       

/*=========================GetTop wear function start==============================*/
function gettop(){
    global $con;
        $sql = "SELECT * FROM products where m_cat_id=18 or m_cat_id=28  ORDER BY RAND() LIMIT 9";
                            
         $res = mysqli_query($con, $sql);

        while($row = mysqli_fetch_array($res))
        {
            $p_id = $row['p_id'];
    
            $product_title = $row['product_title'];
    
            $product_price = $row['product_price'];
    
            $p_img1 = $row['p_img1'];

            echo "
            <div class='col-lg-4 col-sm-6 mix all dresses bags'>
            <div class='single-product-item'>
                <figure>
                    <a href='details.php?p_id=$p_id'>
                        <img src='./admin_area/product_images/$p_img1' alt=''>
                    </a>
                    
                </figure>
                <div class='product-text'>
                    <h6>
                        <a href='details.php?pro_id=$p_id'>

                            $product_title

                        </a>
                    </h6>
                    <p>Rs.$product_price</p>
                </div>
            </div>
        </div>
    ";
            
        }

                           
}
/*=========================GetTop wear function end==============================*/   

/*=========================GetBottom wear function start==============================*/
function getbottom(){
    global $con;
        $sql = "SELECT * FROM products where m_cat_id=19  ORDER BY RAND() LIMIT 9";
                            
         $res = mysqli_query($con, $sql);

        while($row = mysqli_fetch_array($res))
        {
            $p_id = $row['p_id'];
    
            $product_title = $row['product_title'];
    
            $product_price = $row['product_price'];
    
            $p_img1 = $row['p_img1'];

            echo "
            <div class='col-lg-4 col-sm-6 mix all dresses bags'>
            <div class='single-product-item'>
                <figure>
                    <a href='details.php?p_id=$p_id'>
                        <img src='./admin_area/product_images/$p_img1' alt=''>
                    </a>
                    
                </figure>
                <div class='product-text'>
                    <h6>
                        <a href='details.php?pro_id=$p_id'>

                            $product_title

                        </a>
                    </h6>
                    <p>Rs.$product_price</p>
                </div>
            </div>
        </div>
    ";
            
        }

                           
}
/*=========================GetBottom wear function end==============================*/  

/*=========================GetSuit wear function start==============================*/
function getsuit(){
    global $con;
        $sql = "SELECT * FROM products where m_cat_id=27  ORDER BY RAND() ";
                            
         $res = mysqli_query($con, $sql);

        while($row = mysqli_fetch_array($res))
        {
            $p_id = $row['p_id'];
    
            $product_title = $row['product_title'];
    
            $product_price = $row['product_price'];
    
            $p_img1 = $row['p_img1'];

            echo "
            <div class='col-lg-4 col-sm-6 mix all dresses bags'>
            <div class='single-product-item'>
                <figure>
                    <a href='details.php?p_id=$p_id'>
                        <img src='./admin_area/product_images/$p_img1' alt=''>
                    </a>
                    
                </figure>
                <div class='product-text'>
                    <h6>
                        <a href='details.php?pro_id=$p_id'>

                            $product_title

                        </a>
                    </h6>
                    <p>Rs.$product_price</p>
                </div>
            </div>
        </div>
    ";
            
        }

                           
}
/*=========================Getsuit wear function end==============================*/ 


/*=========================GetSuit wear function start==============================*/
function getformal_shirt(){
    global $con;
        $sql = "SELECT * FROM products where s_cat_id=10  ORDER BY RAND()";
                            
         $res = mysqli_query($con, $sql);

        while($row = mysqli_fetch_array($res))
        {
            $p_id = $row['p_id'];
    
            $product_title = $row['product_title'];
    
            $product_price = $row['product_price'];
    
            $p_img1 = $row['p_img1'];

            echo "
            <div class='col-lg-4 col-sm-6 mix all dresses bags'>
            <div class='single-product-item'>
                <figure>
                    <a href='details.php?p_id=$p_id'>
                        <img src='./admin_area/product_images/$p_img1' alt=''>
                    </a>
                    
                </figure>
                <div class='product-text'>
                    <h6>
                        <a href='details.php?pro_id=$p_id'>

                            $product_title

                        </a>
                    </h6>
                    <p>Rs.$product_price</p>
                </div>
            </div>
        </div>
    ";
            
        }

                           
}
/*=========================Get Formal shirt wear function end==============================*/ 


/*=========================GetSuit wear function start==============================*/
function getcasual_shirt(){
    global $con;
        $sql = "SELECT * FROM products where s_cat_id=11  ORDER BY RAND()";
                            
         $res = mysqli_query($con, $sql);

        while($row = mysqli_fetch_array($res))
        {
            $p_id = $row['p_id'];
    
            $product_title = $row['product_title'];
    
            $product_price = $row['product_price'];
    
            $p_img1 = $row['p_img1'];

            echo "
            <div class='col-lg-4 col-sm-6 mix all dresses bags'>
            <div class='single-product-item'>
                <figure>
                    <a href='details.php?p_id=$p_id'>
                        <img src='./admin_area/product_images/$p_img1' alt=''>
                    </a>
                    
                </figure>
                <div class='product-text'>
                    <h6>
                        <a href='details.php?pro_id=$p_id'>

                            $product_title

                        </a>
                    </h6>
                    <p>Rs.$product_price</p>
                </div>
            </div>
        </div>
    ";
            
        }

                           
}
/*=========================Get Formal shirt wear function end==============================*/


/*=========================Get Blazer function start==============================*/
function getblazer(){
    global $con;
        $sql = "SELECT * FROM products where m_cat_id=28  ORDER BY RAND()";
                            
         $res = mysqli_query($con, $sql);

        while($row = mysqli_fetch_array($res))
        {
            $p_id = $row['p_id'];
    
            $product_title = $row['product_title'];
    
            $product_price = $row['product_price'];
    
            $p_img1 = $row['p_img1'];

            echo "
            <div class='col-lg-4 col-sm-6 mix all dresses bags'>
            <div class='single-product-item'>
                <figure>
                    <a href='details.php?p_id=$p_id'>
                        <img src='./admin_area/product_images/$p_img1' alt=''>
                    </a>
                    
                </figure>
                <div class='product-text'>
                    <h6>
                        <a href='details.php?pro_id=$p_id'>

                            $product_title

                        </a>
                    </h6>
                    <p>Rs.$product_price</p>
                </div>
            </div>
        </div>
    ";
            
        }

                           
}
/*=========================Get Blazer function end==============================*/ 
/*=========================Get formal trouser function start==============================*/
function getformal_trouser(){
    global $con;
        $sql = "SELECT * FROM products where s_cat_id=12  ORDER BY RAND()";
                            
         $res = mysqli_query($con, $sql);

        while($row = mysqli_fetch_array($res))
        {
            $p_id = $row['p_id'];
    
            $product_title = $row['product_title'];
    
            $product_price = $row['product_price'];
    
            $p_img1 = $row['p_img1'];

            echo "
            <div class='col-lg-4 col-sm-6 mix all dresses bags'>
            <div class='single-product-item'>
                <figure>
                    <a href='details.php?p_id=$p_id'>
                        <img src='./admin_area/product_images/$p_img1' alt=''>
                    </a>
                    
                </figure>
                <div class='product-text'>
                    <h6>
                        <a href='details.php?pro_id=$p_id'>

                            $product_title

                        </a>
                    </h6>
                    <p>Rs.$product_price</p>
                </div>
            </div>
        </div>
    ";
            
        }

                           
}
/*=========================Get formal trouser function end==============================*/ 
/*=========================Get formal trouser function start==============================*/
function getcasual_trouser(){
    global $con;
        $sql = "SELECT * FROM products where s_cat_id=13  ORDER BY RAND()";
                            
         $res = mysqli_query($con, $sql);

        while($row = mysqli_fetch_array($res))
        {
            $p_id = $row['p_id'];
    
            $product_title = $row['product_title'];
    
            $product_price = $row['product_price'];
    
            $p_img1 = $row['p_img1'];

            echo "
            <div class='col-lg-4 col-sm-6 mix all dresses bags'>
            <div class='single-product-item'>
                <figure>
                    <a href='details.php?p_id=$p_id'>
                        <img src='./admin_area/product_images/$p_img1' alt=''>
                    </a>
                    
                </figure>
                <div class='product-text'>
                    <h6>
                        <a href='details.php?pro_id=$p_id'>

                            $product_title

                        </a>
                    </h6>
                    <p>Rs.$product_price</p>
                </div>
            </div>
        </div>
    ";
            
        }

                           
}
/*=========================Get formal trouser function end==============================*/ 
function search(){
    global $con;
    if (isset($_GET['search'])) {
        $searchValue = $_GET['search'];
    }
        $sql = "SELECT * FROM products where product_title LIKE '%$searchValue%'  ORDER BY RAND()";
                            
         $res = mysqli_query($con, $sql);

        while($row = mysqli_fetch_array($res))
        {
            $p_id = $row['p_id'];
    
            $product_title = $row['product_title'];
    
            $product_price = $row['product_price'];
    
            $p_img1 = $row['p_img1'];

            echo "
            <div class='col-lg-4 col-sm-6 mix all dresses bags'>
            <div class='single-product-item'>
                <figure>
                    <a href='details.php?p_id=$p_id'>
                        <img src='./admin_area/product_images/$p_img1' alt=''>
                    </a>
                    
                </figure>
                <div class='product-text'>
                    <h6>
                        <a href='details.php?pro_id=$p_id'>

                            $product_title

                        </a>
                    </h6>
                    <p>Rs.$product_price</p>
                </div>
            </div>
        </div>
    ";
            
        }

                           
}
/*=========================Get formal trouser function end==============================*/ 


/*-------------------------------Check out function---------------------------------*/

function checkout(){
    global $con;
    $total = 0;
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];
    
        $select_cart = "SELECT c.*,p.product_title,p.product_price from cart c, products p where c.p_id=p.p_id and c.user_id='$user_id'";
        
                                    
        $run_cart = mysqli_query($con,$select_cart);
        
                                    
        while($row_cart = mysqli_fetch_array($run_cart))
        {
            
          $p_id = $row_cart['p_id'];
            
            
          $qty = $row_cart['qty'];
                
                $product_title = $row_cart['product_title'];
                
                $product_price = $row_cart['product_price'];
                
                $sub_total = $row_cart['product_price']*$qty;
                
                $total += $sub_total;
                $_SESSION['total'] = $total;
    
                $user_id = $_SESSION['user_id'];  
                             
                $sql = "SELECT * FROM products , cart  WHERE products.p_id=cart.p_id and cart.user_id='$user_id'";
                $res = mysqli_query($con, $sql);
                $count = mysqli_num_rows($res);
                if($count>0){
                 
                             
                         echo "
                             
                            <li> $product_title <span>Rs. $sub_total</span></li>                           
                         ";
                 
                }else{
                    echo "No item in your cart..!";
                }
            }
            echo "<hr><li>Total <span>Rs. $total</span></li>"; 
         }
    }
   
    
    



?>
