const user_input = document.querySelector('#user');
const password_input = document.querySelector('#pass');

const charsNotAllowds =  /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
const error_message = document.querySelector('#error_mess');
const form = document.querySelector('form');


function onClickSub(event){     
    if(charsNotAllowds.test(user_input.value) || charsNotAllowds.test(password_input.value) || user_input.value === "" || password_input.value === ""){              
        error_message.classList.remove('hidden');
        error_message.classList.add('error');
        error_message.textContent = "caratteri non ammessi " +  /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/ + " o campi vuoti";   
        event.preventDefault(); 
                  
    }else{                
        const form_data = {method: 'post', body: new FormData(form)};            
        fetch("hw1_login.php", form_data);       
    }    
}

form.addEventListener('submit',onClickSub);


