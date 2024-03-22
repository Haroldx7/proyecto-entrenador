import {rutinaCliente, titulo, agregarRutina, editarRutina,preVideo, ocultarEditar, ocultarCrear, mostrarCrear, archivoEditarClick, archivoCrearClick} from './modificarrutinaVars.js'

let parametro = new URLSearchParams(window.location.search);
let idusuario = parametro.get('idcliente');
let dia = parametro.get('dia')

let idcliente = {
    id: idusuario,
    dia: dia
}

let tituloDia = document.querySelector('#titulo-dia');
titulo(tituloDia, idcliente);

let video = document.querySelector('#file');
let boxVideo = document.querySelector('.video');

preVideo(video, boxVideo);
rutinaCliente(idcliente);

let agregarRutinaForm = document.querySelector('.agregar-rutina');
agregarRutina(agregarRutinaForm, idcliente);

let editarRutinaForm = document.querySelector(".editar-rutina");
editarRutina(editarRutinaForm, idcliente);

let cancelarCrear = document.querySelector('#cancelar-crear');
ocultarCrear(cancelarCrear);

let cancelarEditar = document.querySelector('#cancelar-editar');
ocultarEditar(cancelarEditar);

let crearRutina = document.querySelector('#crear-rutina');
mostrarCrear(crearRutina);


let archivoEditar = document.querySelector('.archivo-editar');
archivoEditarClick(archivoEditar);


let archivoCrear = document.querySelector('.archivo-crear');
archivoCrearClick(archivoCrear);
