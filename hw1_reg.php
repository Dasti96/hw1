<?php    
    $error = array("email" => false, "user" => false);    
  
    if(isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['email']) && isset($_POST['nome']) && isset($_POST['cognome'])){
        $connection = mysqli_connect("localhost","root","","hw1");
        $user_escaped = mysqli_real_escape_string($connection, $_POST['user']);
        $pass_escaped = mysqli_real_escape_string($connection, $_POST['pass']); 
        $email_escaped = mysqli_real_escape_string($connection, $_POST['email']);
        $nome_escaped = mysqli_real_escape_string($connection, $_POST['nome']);                   
        $cognome_escaped = mysqli_real_escape_string($connection, $_POST['cognome']);
        $tel_escaped = mysqli_real_escape_string($connection, $_POST['tel']);
       
        $q_insert = "insert into user values('".$nome_escaped."','".$cognome_escaped."','".$email_escaped."','".$user_escaped."','".$pass_escaped."','".$tel_escaped."');";
      
        $q_selectionEmail = "select * from user where email = '".$email_escaped."';";
        $q_selectionUserName= "select * from user where username = '".$user_escaped."';";
        $res = mysqli_query($connection, $q_selectionEmail);
        $array=[];
        $index = 0;                  
      
        $num_rows = mysqli_num_rows($res);
      
       if($num_rows>0)         
          $error['email'] = true;

        mysqli_free_result($res);
        $res =  mysqli_query($connection, $q_selectionUserName);
        $num_rows = mysqli_num_rows($res);
       
        if($num_rows>0)             
            $error['user'] = true;
        mysqli_free_result($res); 

        if($error['email'] === false && $error['user'] === false){       
            mysqli_query($connection, $q_insert);  
            header('Location:hw1_login.php');
            exit;
        }       
        mysqli_close($connection);
    }
?>




<!DOCTYPE html>
<html>
<head>
    <title>SAEP ICT Engineering/Registrazione</title>
    <meta name="viewport" content="width=device width, initial scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="hw1_reg_log.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet"> 
    <script src = "hw1_reg_script.js" defer></script>
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
                <label><span class="essential">*</span>Nome<input id="nome" name="nome" type="text"></label>
                <label><span class="essential">*</span>Cognome<input id="cognome" name="cognome" type="text"></label>
                <label><span class="essential">*</span>Email<input id="email" name="email" type="text"></label>
                <label><span class="essential">*</span>Username<input id="user" name="user" type="text"></label>
                <label><span class="essential">*</span>Password<input id="pass" name="pass" type="password"></label>
                <label>Numero di telefono<input id="tel" name="tel" type="text"></label>
                <input id="sub" type="submit" value="Registrati">  
            </div>
            <?php
                if($error['email'] === true && $error['user'] === true )
                    echo "<p id='error_mess' class='error'>Username ed email gia' presenti nel DB</p>";
                else if($error['user'] === true)
                    echo "<p id='error_mess' class='error'>Username gia' presente nel DB</p>";
                else if($error['email'] === true)
                    echo "<p id='error_mess' class='error'>Email gia' presente nel DB</p>";              
              
            ?>         
            <p id="error_mess" class="hidden"></p>   
                                   
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