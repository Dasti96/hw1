const news_container = document.querySelector('#news');

function onResponse(response){
    if(response.ok){
        console.log('json recuperato');
        return response.json();        
    }
    else
        console.log('errore! impossibile recuperare il json');
        
}

var counter_news = 0 ;
var response = '';
function newsJson(json){
    console.log(json);
    
   
    response = json.articles;
    const img_arrow_left = document.createElement('img');
    const img_arrow_right = document.createElement('img');
    img_arrow_left.src = 'arrow_left.png'; 
    img_arrow_right.src = 'arrow_right.png';  
    const  right_button = document.createElement('div');   
    const left_button = document.createElement('div'); 
    left_button.appendChild(img_arrow_left);   
    right_button.appendChild(img_arrow_right);   
    right_button.addEventListener('click',onButtonRightClick);    
    left_button.addEventListener('click',onButtonLeftClick);    
    left_button.classList.add('left_right_button');
    right_button.classList.add('left_right_button');
    const news = document.createElement('p'); 
    const news_link = document.createElement('a');
    news_link.textContent = "link all'articolo";
    
    news_link.href = response[counter_news].url;
    news_link.classList.add('news_link');
    news.classList.add('news_content');
   
    news.textContent = response[counter_news].title;
    news_container.appendChild(left_button);    
    news_container.appendChild(news);
    news_container.appendChild(right_button);
    news_container.parentElement.appendChild(news_link);
}

function onButtonRightClick(){   
   
    if(counter_news >= response.length - 1)
        counter_news = 0;
    else
        counter_news++;    
    checkingCounter(); 
    
}

function onButtonLeftClick(){   
   
    if(counter_news <= 0)
        counter_news = response.length - 1;
    else
        counter_news--;   
    checkingCounter();
    
}

function checkingCounter(){
    const news_content = news_container.querySelector('.news_content');
    const news_link = news_container.parentElement.querySelector('.news_link');
    if(counter_news < response.length){
       
        news_content.textContent = response[counter_news].title;
        news_link.href = response[counter_news].url;
    }
}


function newsAPI(){    
    fetch('homeAPI.php').then(onResponse).then(newsJson);
}
newsAPI();