<?php 
include("includes/header.php");
include("includes/db.php");

if(isset($_SESSION['message'])){
    $user_email = $_SESSION['user_email'];
    $sql = "SELECT * FROM user_table WHERE email='$user_email'";
    
    $res = mysqli_query($con, $sql);

    while($row=mysqli_fetch_array($res)){
        $user_name = $row['firstname'].' '.$row['lastname'];
        $user_email = $row['email'];
        $address = $row['address'];
        $country = $row['country'];
        $city = $row['city'];
        $phone = $row['phone'];

        echo "
        
                    
                <section class='checkout spad'>
                <div class='container'>
                    <form action='change_address.php' method='POST' class='checkout__form'>
                        <div class='row'>
                            <div class='col-lg-8'>
                               
                                <div class='col-lg-8 center_it'>
                                    <div class='checkout__order'>
                                        <h5>My Account</h5>
                                                <div class='checkout__order__product'>
                                                    <ul>
                                                        <li>
                                                            <span class='top__text'>Name:</span>
                                                            <span class='top__text__right'>$user_name</span>
                                                        </li>
                                                        <li>
                                                            <span class='top__text'>Email:</span>
                                                            <span class='top__text__right'>$user_email</span>
                                                        </li>
                                                        <li>
                                                            <span class='top__text'>Phone:</span>
                                                            <span class='top__text__right'>$phone</span>
                                                        </li>
                                                        <li>
                                                            <span class='top__text'>Country:</span>
                                                            <span class='top__text__right'>$country</span>
                                                        </li>
                                                        <li>
                                                            <span class='top__text'>City</span>
                                                            <span class='top__text__right'>$city</span>
                                                        </li>
                                                        <li>
                                                            <span class='top__text'>Address:</span>
                                                            <span class='top__text__right'>$address</span>
                                                        </li>
                                                    </ul>
                                                </div><br>
                                                <button type='submit' name='update'  class='primary-btn btn-primary col-lg-8 offset-lg-2'>Change Address</button>
                                            
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </section>
        ";
        
    }
}
else{
    echo "<div class='center_h1'>
            <h1>Please login to see your account..!</h1>
        </div>";
}
?>


<?php

    
    include("includes/footer.php");
    
    ?>
    
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>
    
    
