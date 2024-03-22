import {mostarInfoHome, iamgenPrevista, fondoPrevista, personalizar} from './personalizarVars.js'

let personalizacion = document.querySelector('#personalizacion');


let imagen = document.querySelector('#imagen');
let texto = document.querySelector('#texto');
let fondo = document.querySelector('#fondo');
let cajaImagen = document.querySelector('.caja-imagen');
let cajaFondo = document.querySelector('.caja-fondo');

mostarInfoHome();
personalizar(personalizacion, imagen, texto, fondo);
iamgenPrevista(cajaImagen, imagen);
fondoPrevista(cajaFondo, fondo);














