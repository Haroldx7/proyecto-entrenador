import {Navegar} from './vars.js';
let index = new Navegar();


if(document.querySelector('#home')){
    let home = document.querySelector('#home');
    index.identificar(home);
}
if(document.querySelector('#login')){
    
let login = document.querySelector('#login');
index.identificar(login);

}
if(document.querySelector('#admin')){
    let admin = document.querySelector('#admin');
    index.identificar(admin);
}

// let catalogo = document.querySelector('#catalogo');
// index.identificar(catalogo);

if(document.querySelector('#cliente')){

    let cliente = document.querySelector('#cliente');
    index.identificar(cliente);
    
}
if(document.querySelector('#cerrar')){
    let cerrar = document.querySelector('#cerrar');
cerrar.addEventListener('click', function(){
    window.location.href = './index.php?home&cerrar=true';    
})
};
