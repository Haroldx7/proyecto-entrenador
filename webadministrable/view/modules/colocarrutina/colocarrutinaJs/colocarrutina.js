import {mostarCliente} from './colocarrutinaVars.js'

let parametro = new URLSearchParams(window.location.search);
let valor = parametro.get('idcliente');

let idcliente = {
    id: valor
}

mostarCliente(idcliente);


