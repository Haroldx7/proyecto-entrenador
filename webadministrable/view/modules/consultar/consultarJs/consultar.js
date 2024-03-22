import { Consultar, barraBusqueda } from './consultarVars.js'

let consulta = new Consultar();

consulta.mostrarDatos();

let formConsultar = document.querySelector('.form-consultar');
consulta.consultarDatos(formConsultar);


let formEditar = document.querySelector('.form-editar');
consulta.gardarEditar(formEditar);

let buscar =  document.querySelector('#busqueda');
barraBusqueda(buscar);



let cajaConsulta = document.querySelector('.caja-consulta');
let cajaBusqueda = document.querySelector('.caja-busqueda');
let tablaConsulta = document.querySelector('.tabla-consulta');
let cajaEditar = document.querySelector('.caja-editar');
let inputs = document.querySelector('.form-editar').querySelectorAll('.input');


let cancelarEditar = document.querySelector("#cancelar-editar");
consulta.cancelar(cancelarEditar);

export let variablesCajas = {
    cajaConsulta: cajaConsulta,
    cajaBusqueda: cajaBusqueda,
    tablaConsulta: tablaConsulta,
    cajaEditar: cajaEditar,
    inputs: inputs
}


let imagenCliente = document.querySelector('.caja-imagen');
let file = document.querySelector('#file');


imagenCliente.addEventListener('click', function(){
    file.click();
})

file.addEventListener('change', function(e){
    alert(imagenCliente);
    imagenCliente.innerHTML = '';
    let archvio = e.target.files[0];
    let url = URL.createObjectURL(archvio);

    let img = document.createElement('img');
    img.src = url;
    img.id = 'imagen-cliente';
    imagenCliente.appendChild(img);
})


