<?php include('../ALU/includes/db.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>

    <title>return</title>
    <link rel="stylesheet" href="styles/header_footer_style.css">
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js">
    

    <style>
        body {
    font-family: "Roboto", Helvetica, Arial, sans-serif;
    font-weight: 100;
    font-size: 12px;
    line-height: 30px;
    color: #777;
    background: #fff
}

.container {
    max-width: 400px;
    width: 100%;
    margin: 0 auto;
    position: relative
}

#contactus {
    font: 400 12px/16px "Roboto", Helvetica, Arial, sans-serif;
    background: #F9F9F9;
    padding: 25px;
    margin: 150px 0;
    box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24)
}
#contactus h3 {
    display: block;
    font-size: 30px;
    font-weight: 300;
    margin-bottom: 10px
}

#contactus h4 {
    margin: 5px 0 15px;
    display: block;
    font-size: 13px;
    font-weight: 400
}

fieldset {
    border: medium none !important;
    margin: 0 0 10px;
    min-width: 100%;
    padding: 0;
    width: 100%
}

#contactus input[type="text"],
#contactus input[type="email"],
#contactus input[type="tel"],
#contactus input[type="url"],
#contactus textarea {
    width: 100%;
    border: 1px solid #ccc;
    background: #FFF;
    margin: 0 0 5px;
    padding: 10px
}

#contactus input[type="text"]:hover,
#contactus input[type="email"]:hover,
#contactus input[type="tel"]:hover,
#contactus input[type="url"]:hover,
#contactus textarea:hover {
    -webkit-transition: border-color 0.3s ease-in-out;
    -moz-transition: border-color 0.3s ease-in-out;
    transition: border-color 0.3s ease-in-out;
    border: 1px solid #aaa
}

#contactus textarea {
    height: 100px;
    max-width: 100%;
    resize: none
}

#contactus button[type="submit"] {
    cursor: pointer;
    width: 100%;
    border: none;
    background: #f0715f;
    color: #FFF;
    margin: 0 0 5px;
    padding: 10px;
    font-size: 15px
}

#contactus button[type="submit"]:hover {
    background: #f07150;
    -webkit-transition: background 0.3s ease-in-out;
    -moz-transition: background 0.3s ease-in-out;
    transition: background-color 0.3s ease-in-out
}

#contactus button[type="submit"]:active {
    box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5)
}

#contactus input:focus,
#contactus textarea:focus {
    outline: 0;
    border: 1px solid #aaa
}

::-webkit-input-placeholder {
    color: #888
}

:-moz-placeholder {
    color: #888
}

::-moz-placeholder {
    color: #888
}

:-ms-input-placeholder {
    color: #888
}
    </style>
</head>
<body>
<div class="container">
    <form id="contactus" action="" method="post">
    <?php 
    if(isset($_GET['p_id'])){

        $p_id = $_GET['p_id'];
        


        $sql = "SELECT p.*,c.* from  products p, customer_orders c where p.p_id=c.p_id and p.p_id='$p_id'";
            
        $res = mysqli_query($con,$sql);

        $row = mysqli_fetch_array($res);

        $qty = $row['qty'];

        $product_img = $row['p_img1'];
        $product_title = $row['product_title'];
        $product_price = $row['product_price'];
        $total = $product_price * $qty;
    
    }
    
?>

            <section class="shop-cart spad">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="shop__cart__table">
                                <h1>Cancel Form</h1><br><br><br>
                                <table>
                                    <thead>
                                            <th>Product</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            
                                       
                                    </thead>
                                    <tbody>
                                            <td class="cart__product__item">
                                                <img src="admin_area/product_images/<?php echo $product_img ?>" alt="" width="100px">
                                                <div class="cart__product__item__title">
                                                    <h4><?php echo $product_title ?></h4>
                                                    <div class="rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cart__price">Rs. <?php echo $product_price?></td>
                                            <td class="cart__quantity">
                                                <div class="qty_box">
                                                    <p name="qty" style="color:red"><?php echo $qty?></p> 
                                                </div>
                                            </td>
                                            <td class="cart__total">Rs. <?php echo $total?></td>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>    
            </section>
            <label for="cancle" style="font-weight: bold;font-size: 20px;">Chose a reason </label>&nbsp;&nbsp;&nbsp;
            <select name="cancle" id="cancle" style="text-decoration: none;font-size:large;">
            <option >Wrong item</option>
            <option>Wrong Size</option>
            <option >Product Damaged</option>
            <option >Others</option>
            </select><br><br>
        
        
        <fieldset> <button name="submit" type="submit" id="contactus-submit" data-submit="...Sending"><i id="icon" class=""></i> Cancel Now</button> </fieldset>
    </form>
</div>
</body>
</html>
<?php
    if(isset($_POST['submit']))
    {

        $reason = $_POST['cancle'];
       
        $res = mysqli_query($con,$sql);

        $row = mysqli_fetch_array($res);

       
        $user_id = $row['user_id'];
        $p_id = $row['p_id'];
   
        $invoice_number = $row['invoice_number'];
    

        $size = $row['size'];

        $return_product = "INSERT into cancellation set 
            
            user_id='$user_id',
            p_id = '$p_id',
            product_price=$total,
            product_title = '$product_title',
            invoice_number=$invoice_number,
            qty=$qty,
            size='$size',
            date=NOW(),
            cancel_reason = '$reason'
        ";
         $run_return_product = mysqli_query($con,$return_product);

       
        $delete_cart = "DELETE  from customer_orders where p_id='$p_id'";
        
        $run_delete = mysqli_query($con,$delete_cart);
        
        echo "<script>alert('Your orders has been Canceled. Your amount will be refund within 2 working day')</script>";
        
        echo "<script>window.open('my_orders.php','_self')</script>";
        
    }
?>
