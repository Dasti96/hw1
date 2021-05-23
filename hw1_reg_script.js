const form = document.querySelector('form');
const charsAllowds = /^[a-zA-Z]+$/
const isNum = /^\d+$/;

const error = form.querySelector('#error_mess');


function errorDetected(errorString){      
    error.classList.remove('hidden');
    error.classList.add('error');
    error.textContent = errorString;    
}

function onClickSub(event){     
    if(form.querySelector('#nome').value === "" || form.querySelector('#cognome').value === "" || form.querySelector('#email').value === ""){
        errorDetected('I valori essenziali non sono stati inserirti (*)');
        event.preventDefault(); 
      
    }else if(!charsAllowds.test(form.querySelector('#nome').value) || isNum.test(form.querySelector('#nome').value)){        
        errorDetected('Il nome inserito non é valido');
        event.preventDefault();        

    }else if(!charsAllowds.test(form.querySelector('#cognome').value) || isNum.test(form.querySelector('#cognome').value)){        
        errorDetected('Il cognome inserito non é valido');
        event.preventDefault();        

    }else{
        const form_data = {body: new FormData(form)};        
        fetch("hw1_reg.php", form_data); 
        error.classList.remove('error');
        error.classList.add('hidden');        
    }
}

form.addEventListener('submit', onClickSub);