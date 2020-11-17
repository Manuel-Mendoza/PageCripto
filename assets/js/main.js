var mediaqueryList = window.matchMedia("(max-width: 996px)");
    if (mediaqueryList.matches){
        document.body.style='display:none'
        alert('Página Web no accesible para Tablet o Móbiles')
    }

function change(){
    const login = document.getElementById('login');
    const register = document.getElementById('register');

    if (login.style='display:flex'){
        login.style='display:none'
        register.style='display:flex'
    }
}
function change2(){
    const login = document.getElementById('login');
    const register = document.getElementById('register');

    if(login.style='display:none'){
        login.style='display:flex'
        register.style='display:none'
    }
}