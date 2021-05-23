<?php
    if(!isset($_SESSION))
        session_start();
    $_SESSION['current_page'] = "hw1_home.php";

?>



<!DOCTYPE html>
<html>
<head>
    <title>SAEP ICT Engineering</title>
    <meta name="viewport" content="width=device width, initial scale=1">
    <meta charset="UTF-8">
    <link rel="stylesheet" href="hw1_home.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lora&display=swap" rel="stylesheet"> 
    <script src = "script_home.js" defer></script>
    <script src = "cartHandler.js" defer></script>  
</head>
<body>
    <div id='modal' class='hidden'>
        <div>
            <h2>ordini di <?php if(isset($_SESSION['user'])) echo json_encode($_SESSION['user'])?></h2>
            <div id='modal_content'></div>            
        </div>
    </div>     
    <nav>        
        <div class="navigation">
            <a id="home" href="hw1_home.php">home</a>
            <a id="shop" href="hw1_shop.php">shop</a>
            <img id="logo" src="saep_ict.png" alt=""> 
            <?php 
               include_once  'log_buttonHandler.php';
            ?>
            <img id="cart_button" src="cart.png" alt="">
        </div>    
    </nav>                       
    <header>       
       
        <div id="overlay">                    
            <h2>
                saep ict engineering
            </h2>        
            <p>
                La nostra software house con sede a Milano, lungo il naviglio Pavese – la città italiana 
                che più di tutte incarna l’apertura all’innovazione e la capacità di offrire un mercato dinamico, sfidante e davvero all’altezza dei concorrenti internazionali.                
            </p>   
            <p>
                Il nostro è un team di ingegneri, sviluppatori e creativi: un gruppo di lavoro completo, che ci offre la possibilità di seguire i nostri clienti dall’analisi e progettazione delle proprie applicazioni WEB, Mobile e IoT, alla User Interface 
                fino alla vera e propria realizzazione delle soluzioni e alla loro messa in produzione. 
            </p>            
        </div>                                        
    </header>
    <article>       
        <div id='cart_home'>
            <div id='container_cart'>
                <h2>Carrello</h2>  
                <div id = 'cart'></div>                                                     
                <h2 id='check_out' >check-out</h2> 
                <span id='show_orders'>mostra i tuoi ordini</span>                           
            </div> 
        </div>                      
        <div id = 'sections_container'>         
            <section id="art_head">
                <div class="sec_item">
                    <h2>news</h2>  
                    <div id='news'>                
                    </div>                    
                </div>
            </section>
                
            <section class="sec1">
                <div class="sec_item">
                    <img src="smart-working-2-640x426-640x320.jpg" alt="">            
                    <p>Lavoro in sede o da remoto</p>
                </div>
                <div class="sec_item">
                    <img src="software-house-consigli-e1553707842317.jpg" alt="">                            
                    <p>Consulenza e supporto all'utente garantita!</p>
                </div>
            </section>
            
            <section class="sec2">
                <div class="sec_item">
                    <img src="Software-house-roma-e1568739934687.jpg" alt="">            
                    <p>Gruppi di lavoro ed organizzazione sono il nostro motto</p>
                </div>
                <div class="sec_item">
                    <img src="Software-house-a-Pavia-per-aziende-manifatturiere.webp" alt="">                            
                    <p>La tecnologia piú avanzata disponibile per l'implementazione in qualsiasi campo </p>
                </div>
            </section>  
            <section id="art_end">
                <h2>contattaci e scegli oggi il tuo futuro!</h2>  
            </section>
        </div>     
    </article>                      
    <footer>
        <em>Telefono: 0331239822 </em>
        <em>Email: <a href="">saep.eng@gmail.com </a></em> 
        <em id='nome_cognome'>Nome e cognome: Salvatore Alí </em>
        <em id="matricola">Matricola: O46001511 </em>
    </footer>

</body>
</html>