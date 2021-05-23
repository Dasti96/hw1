<?php
    if(!isset($_SESSION))
        session_start();
    $_SESSION['current_page'] = "hw1_shop.php";

?>



<!DOCTYPE html>
<html>
    <head>  
        <title>SAEP ICT Engineering</title>
        <meta name="viewport" content="width=device width, initial scale=1">
        <meta charset="UTF-8">        
        <link rel="stylesheet" href="hw1_shop.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet">    
        <script src = "contents_shop.js" defer></script>
        <script src = "script_shop.js" defer></script>
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
                <img id='cart_button' src="cart.png" alt="">                         
            </div>  
        </nav> 
        <div id='modal' class='hidden'>
            <div>
                <h2>ordini di <?php if(isset($_SESSION['user'])) echo json_encode($_SESSION['user'])?></h2>
                <div id='modal_content'></div>            
            </div>
        </div>           
        <article>
            <section>              
                <div id='container'>
                    <form>
                        <p>cerca <input id = 'search' type="text"></p> 
                        <input type="submit" value="cerca">   
                    </form>   

                </div> 
                    <div>
                        <div id='container_cart'>
                            <h2>Carrello</h2>  
                            <div id = 'cart'></div>                                                     
                            <h2 id='check_out'>check-out</h2>  
                            <span id='show_orders'>mostra i tuoi ordini</span>                          
                        </div> 
                    </div>                                    
            </section>
        </article>
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