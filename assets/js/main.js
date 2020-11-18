/* Error 404 ---------------------------------------------------------------------------------------------*/
var pageX = $(document).width();
var pageY = $(document).height();
var mouseY=0;
var mouseX=0;

$(document).mousemove(function( event ) {
  //verticalAxis
  mouseY = event.pageY;
  yAxis = (pageY/2-mouseY)/pageY*300; 
  //horizontalAxis
  mouseX = event.pageX / -pageX;
  xAxis = -mouseX * 100 - 100;

  $('.box__ghost-eyes').css({ 'transform': 'translate('+ xAxis +'%,-'+ yAxis +'%)' }); 

  //console.log('X: ' + xAxis);

});
/* Error 404 ---------------------------------------------------------------------------------------------*/

function change() {
    const login = document.getElementById('login');
    const register = document.getElementById('register');

    if (login.style = 'display:flex') {
        login.style = 'display:none'
        register.style = 'display:flex'
    }
}
function change2() {
    const login = document.getElementById('login');
    const register = document.getElementById('register');

    if (login.style = 'display:none') {
        login.style = 'display:flex'
        register.style = 'display:none'
    }
}

function validaNumericos(event) {
    if (event.charCode >= 48 && event.charCode <= 57) {
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
        button: "Aceptar!",
    });
}

function VerificarScroll() {
    if (window.location.hash == '#inicial') {
        document.querySelector('#up').style = 'display:none;'
    }
}


function Baja() {
    const down = document.querySelector('#down');
    const link = window.location;
    document.querySelector('#up').style = 'display:inline-block;'

    if (link.hash == '#inicial') {
        down.href = '#Parte2';
    }

    if (link.hash == '#Parte2') {
        down.href = '#Parte3';
    }

    if (link.hash == '#Parte3') {
        down.href = '#Parte4';
    }
    if (link.hash == '#Parte4') {
        down.href = '#Descargas';
    }
    if (link.hash == '#Descargas') {
        down.href = '#Exchange';
    }
    if (link.hash == '#Exchange') {
        down.href = '#Link';
    }
}

function sube() {
    const down = document.querySelector('#up');
    const link = window.location;

    if (link.hash == '#Parte2') {
        down.href = '#inicial';
    }
    if (link.hash == '#Parte3') {
        down.href = '#Parte2';
    }
    if (link.hash == '#Parte4') {
        down.href = '#Parte3';
    }
    if (link.hash == '#Descargas') {
        down.href = '#Parte4';
    }
    if (link.hash == '#Exchange') {
        down.href = '#Descargas';
    }
    if (link.hash == '#Link') {
        down.href = '#Exchange';
    }
    VerificarScroll()
}

if(window.location.pathname == '/' || window.location.pathname == '/pages/login.html'){
    document.body.style='overflow: hidden;';
}

var mediaqueryList = window.matchMedia("(max-width: 996px)");
if (mediaqueryList.matches) {
    location.href='/pages/404.html';
    alert('Página Web no accesible para Tablet o Móbiles')

}

