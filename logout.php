<?php
    include('includes/db.php');
    session_start();
    $user_id = $_SESSION['user_id'];
    unset($_SESSION['user_id']);
    session_destroy();
    
    header("location: home.php")
?>