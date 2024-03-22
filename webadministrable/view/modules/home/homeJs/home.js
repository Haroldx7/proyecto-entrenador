import {mostarInfoHome} from './homeVars.js'

let flecha = document.querySelector('.flecha');

document.addEventListener('scroll', function(){
    let scrollTop = document.documentElement.scrollTop;
    if(scrollTop == 0){
        flecha.style.display = 'block';
    }else{
        flecha.style.display = 'none';
    }
});

flecha.addEventListener('click',function(){
    flecha.style.display = 'none';
    window.scroll({
        top: 100,
        behavior: 'smooth'
    })
})




let imagen = document.querySelector('#imagen-home');
let texto = document.querySelector('#texto-home');
let presentacion = document.querySelector('.presentacion');



mostarInfoHome(imagen, texto, presentacion);
