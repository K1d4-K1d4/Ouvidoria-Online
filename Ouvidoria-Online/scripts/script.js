var header = document.getElementById('header');
var navigationHeader = document.getElementById('navigation_header');
var content = document.getElementById('content');
var showSidebar = false;

function toggleSidebar() {
    showSidebar = !showSidebar;
    console.log(showSidebar);

    // Muda a Visibilidade da Barra de Navegação Lateral
    if (showSidebar) {
        navigationHeader.style.marginLeft = '-10vw';
        navigationHeader.style.animationName ='showSidebar';
        content.style.filter = 'blur(2px)';
    } else {
        navigationHeader.style.marginLeft = '-100vw';
        navigationHeader.style.animationName ='';
        content.style.filter = '';
    }
}

    // Permite Fechar a Barra de Navegação Lateral sem precisar tocar no "x"
function closeSidebar (){
    if(showSidebar){
        toggleSidebar();
    }
}

window.addEventListener('resize', function(event){
    console.log('mudou');
    if(window.innerWidth > 768 && showSidebar){
        toggleSidebar();
    }
});