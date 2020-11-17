var mediaqueryList = window.matchMedia("(max-width: 996px)");
    if (mediaqueryList.matches){
        document.body.style='display:none'
        alert('Página Web no accesible para Tablet o Móbiles')
    }