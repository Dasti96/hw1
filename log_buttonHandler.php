<?php 
    if(!isset($_SESSION))
        session_start();

    if(!isset($_SESSION['user']))
        echo "<a id='login' href='hw1_login.php'>login</a>";
    else{
        echo "<script src = 'hw1_logout.js' defer></script>";
        echo "<a id='login' href=''>benvenuto '".$_SESSION['user']."'!</a>";                
    }
?>