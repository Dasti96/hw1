<?php    
    if(!isset($_SESSION))
        session_start();    

    if(isset($_SESSION["user"])){
        $connection = mysqli_connect("localhost","root","","hw1");
        $user_escaped = mysqli_real_escape_string($connection, $_SESSION["user"]);
        $q_select = "select email from user where username='".$user_escaped."'";

        $res = mysqli_query($connection, $q_select);
        $row = mysqli_fetch_assoc($res);
        $email = $row['email']; 
        mysqli_free_result($res);
        
        $q_selectAcquisti = "select * from acquisto where email = '".$email."';";
        $res  = mysqli_query($connection, $q_selectAcquisti);
        $array_acquisti = array();
        while($row =  mysqli_fetch_assoc($res)){
            $array_acquisti[] = $row;
        }
        echo json_encode($array_acquisti);
    }
?>