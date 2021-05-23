<?php    
    $error = false;       

    if(isset($_POST['user']) && isset($_POST['pass'])){
        $connection = mysqli_connect("localhost","root","","hw1");
        $user_escaped = mysqli_real_escape_string($connection, $_POST['user']);
        $pass_escaped = mysqli_real_escape_string($connection, $_POST['pass']);                    
        $q_selection = "select * from user where username = '".$user_escaped."' and password = '".$pass_escaped."';";
        $res = mysqli_query($connection, $q_selection);
        $array=[];
        $index = 0;
                       
        while($row = mysqli_fetch_assoc($res)){
            $array[$index] = $row;          
            $index++;
        }  
        
        if(count($array) > 0){           
            if(!isset($_SESSION))
                session_start();

            $_SESSION['user'] = $_POST['user'];            
                     
            if(isset($_SESSION['current_page'])){
                header("Location:".$_SESSION['current_page']);                       
                exit; 
            }else{
                header("Location:hw1_home.php");                       
                exit; 
            }         
        }else
            $error = true;           
        
        mysqli_free_result($res);
        mysqli_close($connection);
    } 
?>

<!DOCTYPE html>
<html>
<head>
    <title>SAEP ICT Engineering/login</title>
    <meta name="viewport" content="width=device width, initial scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="hw1_reg_log.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet"> 
    <script src = "hw1_log_script.js" defer></script>
    <script src = "cartHandler.js" defer></script>
</head>
<body>
    <nav>        
        <div class="navigation">
            <a href="hw1_home.php">home</a>
            <a href="hw1_shop.php">shop</a>
            <img id="logo" src="saep_ict.png" alt=""> 
            <?php 
               include_once  'log_buttonHandler.php';
            ?>
            <img id="cart_button" src="cart.png" alt="">
        </div>    
    </nav>
    <header>  
    <form method='post'>
            <div>
                <label>Username<input id="user" name="user" type="text"></label>
                <label>Password<input id="pass" name="pass" type="password"></label>
                <input id="sub" type="submit" value="Login">
            </div>                   
            <?php
                if($error === true)       
                    echo "<p id='error_mess' class='error'>Username e/o password invalidi</p>";
                $error = false;
            ?>
            <p id='error_mess' class='hidden'></p>  
            <a id='reg_link' href="hw1_reg.php">non sei ancora registrato? Clicca qui!</a>                             
        </form>   
    
    </header>
       
    <div id='modal' class='hidden'>
        <div>
            <h2>ordini di <?php if(isset($_SESSION['user'])) echo json_encode($_SESSION['user'])?></h2>
            <div id='modal_content'></div>            
        </div>
    </div>   
        <div>
            <div id='container_cart', class="hidden">
                <h2>Carrello</h2>  
                <div id = 'cart'></div>                                                     
                <h2 id='check_out' >check-out</h2>  
                <span id='show_orders'>mostra i tuoi ordini</span>                           
            </div>                     
        </div>
    <footer>
            <div>
                <em>Telefono: 0331239822 </em>
                <em>Email: <a href="">saep.eng@gmail.com </a></em> 
                <em id='nome_cognome'>Nome e cognome: Salvatore Alí </em>
                <em id="matricola">Matricola: O46001511 </em>
            </div>
    </footer>
</body>
</html>