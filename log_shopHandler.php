<?php 
    $logged = false;
    if(!isset($_SESSION))
        session_start();

    if(isset($_SESSION['user'])){
        $logged = true;        
    }
    echo json_encode($logged);
?>