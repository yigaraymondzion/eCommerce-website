<?php
   include('includes/db.php');
   session_start();
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
<body>
<?php 
      
   ?>
    <div class="container">
        <div class="row">
			<div class="col-md-5 mx-auto">
			
			  <div id="second">
              <div class="logo1">
                <center><h1>ALU</h1></center>
                </div>
			      <div class="myform form ">
                        <div class="logo mb-3">
                           <div class="col-md-12 text-center">
                              <h1 >Signup</h1>
                           </div>
                        </div>
                        <form action="#" name="registration" method="POST">
                           <div class="form-group">
                              <label for="exampleInputEmail1">First Name</label>
                              <input type="text"  name="firstname" id="firstname" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Firstname">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Last Name</label>
                              <input type="text"  name="lastname" id="lastname" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Lastname">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Country</label>
                              <input type="text"  name="country" id="country" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Country" value="India">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">City</label>
                              <input type="text"  name="city" id="city" class="form-control"  aria-describedby="emailHelp" placeholder="Enter City">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Adress</label>
                              <input type="text"  name="address" id="address" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Address">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Phone No</label>
                              <input type="tel"  name="phone" id="phone" class="form-control"  aria-describedby="emailHelp" placeholder="Enter Phone Number">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Email</label>
                              <input type="email" name="email" id="email"  class="form-control"  aria-describedby="emailHelp" placeholder="Enter email">
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Password</label>
                              <input type="password" name="password" id="password"   class="form-control" aria-describedby="emailHelp" placeholder="Enter Password">
                           </div>
                           <div class="col-md-12 text-center mb-3">
                              <input type="submit" name="submit" id="submit" class=" btn btn-block mybtn btn-primary tx-tfm" value="Create Your ALU Account"></input>
                           </div>
                           <div class="col-md-12 ">
                              <div class="form-group">
                                 <!--<p class="text-center"><a href="#" id="signin">Already have an account?</a></p>-->
                                 <p class="text-center">Already have an account?<a href="login.php" id="signin">Sign In here</a></p>
                              </div>
                           </div>
                            </div>
                        </form>
                     </div>
			</div>
		</div>
      </div>   
    <script src="javascript/Login_signup.js"></script>   
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Kaushan+Script" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">     

</body>
</html>

<?php
   if(isset($_POST['submit']))
   {
      $firstname = $_POST['firstname'];
      $lastname = $_POST['lastname'];
      $country = $_POST['country'];
      $city = $_POST['city'];
      $address = $_POST['address'];
      $phone = $_POST['phone'];
      $email = $_POST['email'];
      $password = md5($_POST['password']);

      $check_email = "select * from user_table where email='$email'";
        
        $run_check = mysqli_query($con,$check_email);
        
        if(mysqli_num_rows($run_check)>0){
            
            echo "<script>alert('This Email Already Exist. Please Sign In With The Same Email.')</script>";
            echo "<script>window.open('login.php','_self')</script>";
            
        }else{
      //Sql Query
      $insert_into_db = "INSERT INTO user_table SET
         firstname = '$firstname',
         lastname = '$lastname',
         country = '$country',
         city = '$city',
         address = '$address',
         phone = '$phone',
         email = '$email',
         password = '$password'
      ";
      //Execute the query
      $run = mysqli_query($con, $insert_into_db) or die("connot connect db");

      //checking execution
      if($run==true)
      {
            echo "<script>alert('Signup Successfully.')</script>";
            
            echo "<script>window.open('login.php','_self')</script>";
         
      }
      else
      {
         
         $alert = "<script>alert('Failed To Register.)</script>";
         $_SESSION['message'] = "$alert";
         header("location: signup.php");
         
      }
   }
}
?>