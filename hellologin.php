<?php include_once("conn.php"); ?>
<?php 
 
session_start();
    if(isset($_SESSION['id'])){
        echo "Welcome " . $_SESSION['email'] . " " .  "<a href='logout.php'>Logout</a>";
    }else{
        header("Location: login.php");
        exit;
    }

