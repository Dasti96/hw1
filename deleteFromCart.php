<?php
    if(!isset($_SESSION))
        session_start();    
    
    if(isset($_GET['index_prod'])){ 
        $index =  $_GET['index_prod'];
        if(isset($_SESSION["prod"]))        
            $_SESSION["prod"][$index] = '';                
    } 
?>
