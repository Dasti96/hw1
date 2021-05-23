<?php    
    if(!isset($_SESSION))
        session_start();    

  
    if(isset($_SESSION["prod"]) && isset($_SESSION["user"])){
        $connection = mysqli_connect("localhost","root","","hw1");
        $user_escaped = mysqli_real_escape_string($connection, $_SESSION["user"]);
        $q_select = "select email from user where username='".$user_escaped."'";
       
       
        $index = 0;
        $res = mysqli_query($connection, $q_select);
        $row = mysqli_fetch_assoc($res);
        $email = $row['email'];             
        while(isset($_SESSION["prod"][$index])){
            if($_SESSION["prod"][$index] === ""){
                $index++;
                continue;
            }           
            $title = mysqli_real_escape_string($connection,$_SESSION["prod"][$index][0]);
            $quantity = mysqli_real_escape_string($connection,$_SESSION["prod"][$index][1]);
            $q_ins = "insert into acquisto values('"."','".$email."','".$title."','".$quantity."');";
            mysqli_query($connection, $q_ins);
            $index++;
        }

        mysqli_free_result($res);
        unset($_SESSION["prod"]);
        mysqli_close($connection);
    } 
?>