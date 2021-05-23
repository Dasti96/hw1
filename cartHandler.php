<?php
    if(!isset($_SESSION))
        session_start();    
    
    if(isset($_GET['title']) && isset($_GET['quantity']) && isset($_GET['img'])){ 
        $_SESSION["prod"][] = array($_GET['title'],$_GET['quantity'], $_GET['img']);       
    }
    if(isset($_SESSION["prod"])){        
        echo json_encode($_SESSION["prod"]);
    }else
        echo json_encode("");
?>
