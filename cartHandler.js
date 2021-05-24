const cart_container = document.querySelector('#container_cart');
cart_container.parentElement.classList.add('hidden');
const orders_button = document.querySelector('#show_orders'); 
const modal = document.querySelector('#modal');

function onResponse(response){
    if(response.ok){
        console.log('json recuperato');
        return response.json();        
    }
    else
        console.log('errore! impossibile recuperare il json');        
}

function onClickDelete(event){   
    console.log(event.currentTarget.parentElement.dataset.index);
    cart = cart_container.querySelector('#cart');    
    fetch('deleteFromCart.php?index_prod='+encodeURI(event.currentTarget.parentElement.dataset.index)).then(fetch('cartHandler.php').then(onResponse).then(cartAddElem));    
}

function cartAddElem(json){    
    cart = cart_container.querySelector('#cart');
    cart.innerHTML='';   
    for(let i = 0; i < json.length; i++){ 
        if(json[i]==='')
            continue;       
        const title = document.createElement('h3');
        title.classList.add('title');
        title.textContent = json[i][0];
        const cart = document.querySelector('#cart');
        const cart_elem = document.createElement('div');
        cart_elem.dataset.index = i;
        cart_elem.classList.add('cart_element');
        const img = document.createElement('img');   
        img.src = json[i][2];      
        cart_elem.appendChild(title);
        cart_elem.appendChild(img);
        const del = document.createElement('p');
        const quantity = document.createElement('p');
        quantity.classList.add('.quantity');
        quantity.textContent = "Quantita': " + json[i][1];    
        del.textContent = 'X';        
        del.classList.add('delete'); 
        
        cart_elem.appendChild(quantity);    
        cart_elem.appendChild(del);    
        cart.appendChild(cart_elem);  
    
        del.addEventListener('click',onClickDelete);        
        console.log(json);        
    }
}


function onClickAddCart(event){   
    const num_count = parseInt(event.currentTarget.parentElement.querySelector('.counter').textContent);
    if(num_count === 0)          
        return;

    const prod_img = event.currentTarget.parentElement.querySelector('img');
    const prod_title = event.currentTarget.parentElement.querySelector('.title');
    const counter = parseInt(event.currentTarget.parentElement.querySelector('.counter').textContent);
   
    fetch('cartHandler.php?title='+prod_title.textContent+'&quantity='+counter+'&img='+prod_img.src).then(onResponse).then(cartAddElem);
}

function verifyLogin(json){   
    if(!json)       
        return false;
    else      
        return true;
}


function onCheckoutLogin(json){
    if(verifyLogin(json)){
        fetch('checkOut.php');         
        const cart = document.querySelector('#cart');
        cart.innerHTML='';
    }else
        location.href = "hw1_login.php";

}

function onCheckOutClick(){
    fetch('log_shopHandler.php').then(onResponse).then(onCheckoutLogin);  
     
}


var show_cart = false;
function onClickShowCart(){
    cart = cart_container.querySelector('#cart');
    if(!show_cart){        
        cart.innerHTML='';       
        cart_container.parentElement.classList.remove('hidden');
        fetch('cartHandler.php').then(onResponse).then(cartAddElem);             
        show_cart = true;
    }
    else{
        cart_container.parentElement.classList.add('hidden');
        show_cart = false;
    }
}

function ordersShow(json){
    console.log(json);
    modal_content.innerHTML='';
    for(elem of json){
        const acquisto = document.createElement('p');
        acquisto.textContent ="id: " + elem['id'] + "," + " email: "+  elem['email'] + "," + " prodotto: "  + elem['nome_prodotto'] + "," + " quantita: " +  elem['quantita'];
        modal_content = modal.querySelector('#modal_content');
        modal_content.appendChild(acquisto);
    }
}

var showOrders = false;
function showModal(){
    if(!showOrders){
        modal.classList.remove('hidden');
        document.body.classList.add('noScroll');
        modal.style.top = window.pageYOffset + 'px';        
        showOrders = true;            
    }else{   
        modal.classList.add('hidden');        
        document.body.classList.remove('noScroll');
        showOrders = false;       
    }
}

function showOrdersClick(json){
    if(verifyLogin(json)){              
        fetch('ordersHandler.php').then(onResponse).then(ordersShow);
    }else 
        location.href = "hw1_login.php";
    
    showModal();   
}


function onShowOrdersClick(){   
    fetch('log_shopHandler.php').then(onResponse).then(showOrdersClick)    
    
}
orders_button.addEventListener('click',onShowOrdersClick);
modal.addEventListener('click',showModal);

const check_out = document.querySelector('#check_out');
check_out.addEventListener('click',onCheckOutClick);

const cart_button = document.querySelector('#cart_button');
cart_button.addEventListener('click',onClickShowCart);