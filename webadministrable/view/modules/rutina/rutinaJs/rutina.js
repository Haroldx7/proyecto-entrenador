import {rutinaCliente} from './rutinaVars.js';

let parametro = new URLSearchParams(window.location.search);
let dia = parametro.get('dia')
let diaRutina = document.querySelector('#dia-rutina');
diaRutina.innerHTML = dia;


let idcliente = {
    dia: dia
}

rutinaCliente(idcliente);
