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
    if(isset($_SESSION['user_email']))
    {
        $user_email = $_SESSION['user_email'];
        $check_email = "select * from user_table where email='$user_email'";
        
        $run_check = mysqli_query($con,$check_email);
        
        $row = mysqli_fetch_array($run_check);
    
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $country = $row['country'];
        $address = $row['address'];
        $phone = $row ['phone'];
        $city = $row['city'];

        echo "
        <div class='container'>
        <div class='row'>
			<div class='col-md-5 mx-auto'>
			
			  <div id='second'>
              <div class='logo1'>
                <center><h1>ALU</h1></center>
                </div>
			      <div class='myform form '>
                        <div class='logo mb-3'>
                           <div class='col-md-12 text-center'>
                              <h1 >Change Address</h1>
                           </div>
                        </div>
                        <form action='#' name='registration' method='POST'>
                           <div class='form-group'>
                              <label for='exampleInputEmail1'>First Name</label>
                              <input type='text'  name='firstname' id='firstname' value='$firstname' class='form-control'  aria-describedby='emailHelp' placeholder='Enter Firstname'>
                           </div>
                           <div class='form-group'>
                              <label for='exampleInputEmail1'>Last Name</label>
                              <input type='text'  name='lastname' id='lastname' class='form-control' value='$lastname' aria-describedby='emailHelp' placeholder='Enter Lastname'>
                           </div>
                           <div class='form-group'>
                              <label for='exampleInputEmail1'>Country</label>
                              <input type='text'  name='country' id='country' class='form-control' value='$country' aria-describedby='emailHelp' placeholder='Enter Country'>
                           </div>
                           <div class='form-group'>
                              <label for='exampleInputEmail1'>City</label>
                              <input type='text'  name='city' id='city' class='form-control'value=' $city' aria-describedby='emailHelp' placeholder='Enter City'>
                           </div>
                           <div class='form-group'>
                              <label for='exampleInputEmail1'>Adress</label>
                              <input type='text'  name='address' id='address' class='form-control' value='$address' aria-describedby='emailHelp' placeholder='Enter Address'>
                           </div>
                           <div class='form-group'>
                              <label for='exampleInputEmail1'>Phone No</label>
                              <input type='tel'  name='phone' id='phone' class='form-control' value='$phone'  aria-describedby='emailHelp' placeholder='Enter Phone Number'>
                           </div>
                           <div class='col-md-12 text-center mb-3'>
                              <input type='submit' name='submit' id='submit' class=' btn btn-block mybtn btn-primary tx-tfm' value='Change Address'></input>
                           </div>
                           
                            </div>
                        </form>
                     </div>
			</div>
		</div>
      </div> 
        ";
    }

?>

<?php 
      
   ?>
      
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
        $address = $_POST['address'];
        $phone = $_POST ['phone'];
        $city = $_POST['city'];
      //Sql Query
      $update = "UPDATE user_table SET
         firstname = '$firstname',
         lastname = '$lastname',
         country = '$country',
         city = '$city',
         address = '$address',
         phone = $phone
         WHERE email='$user_email'
      ";
      //Execute the query
      $run = mysqli_query($con, $update) or die("can not connect db");

      //checking execution
      if($run==true)
      {
            echo "<script>alert('Address Updated Successfully.')</script>";
            
            echo "<script>window.open('my_account.php','_self')</script>";
         
      }
      else
      {
         
         $alert = "<script>alert('Failed To Register.)</script>";
         $_SESSION['message'] = "$alert";
         header("location: signup.php");
         
      }
   }

?>