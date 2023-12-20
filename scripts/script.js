/*
const buscar_botao = document.getElementById('buscar-botao');
buscar_botao.addEventListener('click', submit);
*/

const icone_menu = document.getElementById('icone_menu');
const icone_fechar = document.getElementById('icone_fechar');
const sidebar = document.getElementById('sidebar');

function toggleSidebar(){
    sidebar.classList.toggle('hidden');
}

icone_menu.addEventListener('click', toggleSidebar);
icone_fechar.addEventListener('click', toggleSidebar);