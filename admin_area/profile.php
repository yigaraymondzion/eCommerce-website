<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    * {
    margin: 0;
    padding: 0
}

body {
    background-color: #000
}

.card {
    width: 350px;
    background-color: #efefef;
    border: none;
    cursor: pointer;
    transition: all 0.5s
}

.image img {
    transition: all 0.5s
}

.card:hover .image img {
    transform: scale(1.5)
}

.btn {
    height: 140px;
    width: 140px;
    border-radius: 50%
}

.name {
    font-size: 22px;
    font-weight: bold
}

.idd {
    font-size: 14px;
    font-weight: 600
}

.idd1 {
    font-size: 12px
}

.number {
    font-size: 22px;
    font-weight: bold
}

.follow {
    font-size: 12px;
    font-weight: 500;
    color: #444444
}

.btn1 {
    height: 40px;
    width: 150px;
    border: none;
    background-color: #000;
    color: #aeaeae;
    font-size: 15px
}

.text span {
    font-size: 13px;
    color: #545454;
    font-weight: 500
}

.icons i {
    font-size: 19px
}

hr .new1 {
    border: 1px solid
}

.join {
    font-size: 14px;
    color: #a0a0a0;
    font-weight: bold
}

.date {
    background-color: #ccc
}
</style>


<div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
    <div class="card p-4">
        <div class=" image d-flex flex-column justify-content-center align-items-center"> 
            <?php include("../includes/db.php");?>
                <?php
                 session_start(); 
                    if(isset($_SESSION['user_name'])){
                        $user_email = $_SESSION['user_email'];
                        $sql = "SELECT * FROM user_table WHERE email='$user_email'";
                        
                        $res = mysqli_query($con, $sql);
                    
                        while($row=mysqli_fetch_array($res)){
                            $admin_name = $row['firstname'].' '.$row['lastname'];
                            $user_email = $row['email'];
                            $address = $row['address'];
                            $country = $row['country'];
                            $city = $row['city'];
                            $phone = $row['phone'];

                            echo "
                        <button class='btn btn-secondary'> 
                            <img src='../images/shirt1-1.png' height='100' width='100' />
                        </button> 
                        <span class='name mt-3'></span> $admin_name <span class='idd'>$user_email</span>
                        <div class='d-flex flex-row justify-content-center align-items-center gap-2'>
                            <span class='idd1'>**************</span>
                            
                        </div>
                        
                        <div class=' d-flex mt-2'> 
                            <button class='btn1 btn-dark'>Edit Profile</button>
                        </div>            
                        <div class='text mt-3'> 
                            <span>Eleanor Pena is a creator of minimalistic x bold graphics and digital artwork.
                                <br><br> Artist/ Creative Director by Day #NFT minting@ with FND night. </span> 
                        </div>
                        <div class='gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center'>
                            <span><i class='fa fa-twitter'></i></span>
                            <span><i class='fa fa-facebook-f'></i></span> 
                            <span><i class='fa fa-instagram'></i></span> 
                            <span><i class='fa fa-linkedin'></i></span> 
                        </div>
                        <div class=' px-2 rounded mt-4 date '> 
                            <span class='join'>Joined May,2021</span>
                        </div>
                        ";
                    }
                }  

                ?>      
        </div>
    </div>
</div>