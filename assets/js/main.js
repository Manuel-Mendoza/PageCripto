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

function validaNumericos(event) {
    if(event.charCode >= 48 && event.charCode <= 57){
      return true;
     }
     return false;        
}

function copiar_link_ref() {

    var codigoACopiar = document.getElementById('p1');
    var seleccion = document.createRange();
    console.log(codigoACopiar.value)
    seleccion.selectNodeContents(codigoACopiar);
    window.getSelection().removeAllRanges();
    window.getSelection().addRange(seleccion);
    document.execCommand('copy');
    window.getSelection().removeRange(seleccion);

    swal({
        title: "Buen Trabajo!",
        text: "Su Wallet a sido Copiado Correctamente!",
        icon: "success",
        button: "Aww yiss!",
      });
}