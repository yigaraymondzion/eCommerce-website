<?php
session_start();
include("includes/db.php");




?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/login_signup_style.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>ALU</title>
</head>


<!------ Include the above in your HEAD tag ---------->



<body>
   <?php 
      if(isset($_SESSION['message'])){
         echo $_SESSION['message'];
         unset($_SESSION['message']);
      }
   ?>
    <div class="container">
        <div class="row">
			<div class="col-md-5 mx-auto">
			<div id="first">
                <div class="logo1">
                <center><h1>ALU</h1></center>
                </div>
            
				<div class="myform form ">
					<div class="logo mb-3">
						<div class="col-md-12 text-center">
							<h1>Login</h1>
						</div>
					</div>
                    <form action="" method="post" name="login">
                           <div class="form-group">
                              <label for="exampleInputEmail1">Email address</label>
                              <input type="email" name="email"  class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Password</label>
                              <input type="password" name="password" id="password"  class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">
                           </div>
                           <div class="form-group">
                              <p class="text-center">By signing in, you accept and agree to our <a href="#">Terms Of Use</a></p>
                           </div>
                           <div class="col-md-12 text-center ">
                              <button type="submit" name="submit" class=" btn btn-block mybtn btn-primary tx-tfm">Login</button>
                           </div>
                           <div class="col-md-12 ">
                              <div class="login-or">
                                 <hr class="hr-or">
                                 <span class="span-or">or</span>
                              </div>
                           </div>
                           
                           <div class="form-group">
                              <p class="text-center">Don't have account? <a href="signup.php" id="signup">Sign up here</a></p>
                              <p><a href="forgot_password.php" style="margin-left: 125px;">Forgot Your Password?.</a></p>
                           </div>
                    </form>
                 
				</div>
			</div>
			
		</div>
    </div>   
    <script src="javascript/login_signup.js"></script>   
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        
</body>
</body>
</html>

<?php 

    if(isset($_POST['submit'])){

        $user_email = $_POST['email'];
        
        $password = md5($_POST['password']);
        
        $login_query = "SELECT * FROM user_table WHERE email='$user_email' AND password = '$password'";
        
        $login_query_run = mysqli_query($con,$login_query);
        
        $count = mysqli_num_rows($login_query_run);
        
        if($count==1){
            foreach($login_query_run as $data){
               $user_id = $data['user_id'];
               $user_name = $data['firstname'].' '.$data['lastname'];
               $user_email = $data['email'];
               $user_role = $data['user_role'];
               
            }

            $_SESSION['auth']= true;
            $_SESSION['auth_role']= "$user_role";
            $_SESSION['user_email'] = "$user_email";
            $_SESSION['auth_user']=[
               'user_id'=>$user_id,
               'user_name'=>$user_name,
               'email'=>$user_email,
            ];
            
            if($_SESSION['auth_role']=='1')//1=admin
            {
               $alert = "<script>alert('Welcome Admin.')</script>";
               $_SESSION['user_name'] = "$user_name";
               $_SESSION['user_email'] = "$user_email";
               $_SESSION['user_id'] = "$user_id";
               $_SESSION['logedin'] = "$alert";
               header("Location: admin_area/index.php");
               exit(0);
            }
            elseif($_SESSION['auth_role']=='0')//0=user
            {
               
               $alert = "<script>alert('Logged in.')</script>";
               $_SESSION['user_email'] = $user_email;
               $_SESSION['user_id'] = $user_id;
               $_SESSION['message'] = "$alert";
               header('location: home.php');
               /*echo "<script>window.location 'home.php';</script>";*/
               
               exit(0);
            }

            /*echo "<script>alert('Logged in.')</script>";
            
            echo "<script>window.open('index.php?dashboard','_self')</script>";*/
            
        }else{
            $alert = "<script>alert('Invalid Email or Password')</script>";
            $_SESSION['message'] = "$alert";
               header('location: login.php');
        
            exit(0);
            
        }
        
    }
    
  
 ?>  