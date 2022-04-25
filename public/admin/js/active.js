const url = location.pathname;

console.log(url);
const Inicio = document.getElementById('inicio');
const Pendientes = document.getElementById('pendientes');
const Completados = document.getElementById('completados');
const Rechazados = document.getElementById('rechazados');



switch (url) {
    case '/pedidos':
        Inicio.classList.add('active')
    break;
    case '/pedidos/pendientes':
        Pendientes.classList.add('active')
    break;
    case '/pedidos/completados':
        Completados.classList.add('active')
    break;
    case '/pedidos/rechazados':
        Rechazados.classList.add('active')
     break;
}
