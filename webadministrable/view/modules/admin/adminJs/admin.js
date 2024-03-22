import {Navegar} from './adminVars.js'

let admin = new Navegar();

let agregar = document.querySelector('#agregar');
admin.identificar(agregar);


let consultar = document.querySelector('#consultar')
admin.identificar(consultar);

let asignar = document.querySelector('#asignar');
admin.identificar(asignar);

let personalizar = document.querySelector('#personalizar');
admin.identificar(personalizar);