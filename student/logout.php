<?php
if (isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['suser']);
    header('location:login.php');
    
 }
?>