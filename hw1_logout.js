const logout_button = document.querySelector('#login');

function onLogoutClick(){    
    fetch('hw1_logout.php');
}
logout_button.addEventListener('click', onLogoutClick);
