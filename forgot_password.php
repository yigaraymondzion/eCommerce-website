<?php session_start() ?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="styles/header_footer_style.css">
    <link rel="stylesheet" href="style.css">

    <link rel="icon" href="Favicon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>Login Form</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">User Password Recover</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

    </div>
</nav>

<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Password Recover</div>
                    <div class="card-body">
                        <form action="#" method="POST" name="recover_psw">
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                                <div class="col-md-6">
                                    <input type="email" id="email_address" class="form-control" name="email" required autofocus>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4 btn-raduis">
                                <input type="submit" value="Recover" name="recover" class="btn-primary">
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</main>
</body>
</html>


<?php require('includes/db.php');
require('Mail/phpmailer/PHPMailerAutoload.php');
?>
<?php
header('Content-Type: text/html; charset=utf-8');

if(isset($_POST["recover"])){
    $email = $_POST["email"];

    $sql = "SELECT * FROM user_table WHERE email='$email'";
    $res = mysqli_query($con, $sql);
    $query = mysqli_num_rows($res);
      $fetch = mysqli_fetch_assoc($res);

    if(mysqli_num_rows($res) <= 0){
        ?>
        <script>
            alert("<?php  echo "Sorry, no emails exists "?>");
        </script>
        <?php
        }else if($fetch["user_id"] == 0){
            ?>
               <script>
                   alert("Sorry, your account must verify first, before you recover your password !");
                   window.location.replace("./login.php");
               </script>
           <?php
        }
         // generate token by binaryhexa 
         $token = bin2hex(random_bytes(50));

         //session_start ();
         $_SESSION['token'] = $token;
         $_SESSION['email'] = $email;

            $mail = new PHPMailer;
            $mail->CharSet = "utf-8";
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 587;
            $mail->SMTPSecure = 'tls';
            $mail->SMTPAuth = true;


            $gmail_username = "jasonyang9876@gmail.com"; // gmail for sending 
            $gmail_password = "J1234567j"; // password gmail
            


            $sender = "ALU Support"; // sender name
            $email_sender = "noreply@alu.com"; // sender email 
            $email_receiver = "$email"; // receiver eamil ***

            $subject = "RecoveryPassword"; // subject


            $mail->Username = $gmail_username;
            $mail->Password = $gmail_password;
            $mail->setFrom($email_sender, $sender);
            $mail->addAddress($email_receiver);
            $mail->Subject = $subject;

            $email_content = "
                <!DOCTYPE html>
                <html>
                    <head>
                        <meta charset=utf-8'/>
                        <title>ทดสอบการส่ง Email</title>
                    </head>
                    <body>
                    <b>Dear User</b>
                    <h3>We received a request to reset your password.</h3>
                    <p>Kindly click the below link to reset your password</p>
                    http://localhost/ALU/reset_psw.php
                    <br><br>
                    <p>With regrads,</p>
                    <b>ALU Team</b>
                    </body>
                </html>
            ";

            //  ถ้ามี email ผู้รับ
            if($email_receiver){
                $mail->msgHTML($email_content);


                if (!$mail->send()) {  // สั่งให้ส่ง email

                    // กรณีส่ง email ไม่สำเร็จ
                    echo "<h3 class='text-center'>ระบบมีปัญหา กรุณาลองใหม่อีกครั้ง</h3>";
                    echo $mail->ErrorInfo; // ข้อความ รายละเอียดการ error
                }else{
                    // กรณีส่ง email สำเร็จ
                    echo "<script>alert('Email has been sent..! Please check your your email')</script>";
                }	
            }
        }
            ?>