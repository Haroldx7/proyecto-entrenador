import {Agregar, msotarImagen,  imagenPerfil} from './agregarVars.js'



let agregar = new Agregar();


let formAgregar = document.querySelector('.form-agregar');
agregar.agregarDatos(formAgregar);


let file = document.querySelector('#file');
let contenedor = document.querySelector('.imagen-perfil');



imagenPerfil(contenedor, file);


msotarImagen(file, contenedor);


