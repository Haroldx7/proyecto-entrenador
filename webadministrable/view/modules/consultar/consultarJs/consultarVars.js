import {variablesCajas} from './consultar.js'
let click = 'click';
let ruta = './modules/consultar/consultar.module.php';


export class Consultar{
    // constructor(){
    //     this.editar = this.editar.bind(this);
    // };
    
    consultarDatos(form){
        form.addEventListener('submit', e =>{
            e.preventDefault();
            let datosForm = new FormData(form);
            fetch(ruta, {
                method: 'POST',
                body: datosForm
            }).then(respuesta =>{
                if(!respuesta.ok){
                    console.log("Error");
                }else{
                    return respuesta.json()
                }
            }).then(datos =>{
                let html = '';  
                let tabla = document.querySelector('.tabla');
                console.log(datos);
                datos.forEach(dato => { 
                    html +=`
                    <div class="datos">
                        <span>${dato[0]}</span>
                        <span>${dato[1]}</span>
                        <span>${dato[2]}</span>
                        <span>${dato[4]}</span>
                        <span>${dato[6]}</span>
                        <span id="s-editar"><button  id="editar" value="${dato[0]}">Editar</button></span>
                    </div>
                    `;
                    
                });
                tabla.innerHTML = html; 
                let editar = document.querySelectorAll('#editar');
                this.editar(editar);
            });
        });
    } 


    mostrarDatos(){
        let mensaje = {mensaje: 'mensaje'};
        fetch(ruta, {
            method: 'POST',
            body: JSON.stringify(mensaje)
        }).then(respuesta =>{
            if(!respuesta.ok){
                console.log("Error");
            }else{
                return respuesta.json()
            }
        }).then(datos =>{
            console.log(datos);
            let html = '';  
            let tabla = document.querySelector('.tabla');
            datos.forEach(dato => {
                html +=`
                <div class="datos">
                    <span>${dato[0]}</span>
                    <span>${dato[1]}</span>
                    <span>${dato[2]}</span>
                    <span>${dato[4]}</span>
                    <span>${dato[6]}</span>
                    <span id="s-editar"><button  class="editar" id="editar" value="${dato[0]}">Editar</button></span>
                </div>
                `;
            });
            tabla.innerHTML = html;
            let editar = document.querySelectorAll('#editar');
            this.editar(editar);
        });
    }

    gardarEditar(form){
        form.addEventListener('submit', e =>{
            e.preventDefault();
            let formData = new FormData(form);
            
            fetch(ruta, {
                method: 'POST',
                body: formData 
            }).then(respuesta =>{
                if(!respuesta.ok){
                    console.log("Error")
                }else{
                    return respuesta.json();
                }
            }).then(datos=>{
                console.log(datos);
                window.location.href = 'index.php?consultar';3
            });
        })
    }

    editar(botones){
        let mensaje = {
            consulta: 'consultar',
            idUsuario: null,
        };
        botones.forEach(function(boton){
            boton.addEventListener(click, function(){
                mostrar(variablesCajas.cajaConsulta,variablesCajas.cajaBusqueda,variablesCajas.tablaConsulta,variablesCajas.cajaEditar);
               
                
                mensaje.idUsuario = boton.value;
                fetch(ruta, {
                    method: 'POST',
                    body: JSON.stringify(mensaje)
                }).then(respuesta =>{
                    if(!respuesta.ok){
                        console.log("Error");
                    }else{
                        return respuesta.json();
                    }
                }).then(datos =>{
                    let idUsuario = datos[0];
                    let nombres = datos[1];
                    let apellidos = datos[2];
                    let correo = datos[3];
                    let contrasena = datos[4];
                    let etiqueta = datos[5];
                    let rol = datos[6];
                    let imagen = datos[7];
                    let estado = datos[8];
                    variablesCajas.inputs.forEach(function(input){
                        if(input.name == 'idusuario'){
                            input.value = idUsuario
                        }else if(input.name == 'nombres'){
                            input.value = nombres;
                        }else if(input.name == 'apellidos'){
                            input.value = apellidos;
                        }else if(input.name == 'correo'){
                            input.value = correo;
                        }else if(input.name == 'contrasena'){
                            input.value = contrasena;
                        }else if(input.name == 'etiqueta'){
                            input.value = etiqueta;
                        }else if(input.name == 'rol'){
                            input.value = rol;
                        }else if(input.name == 'estado'){
                            input.querySelectorAll('option').forEach(element => {
                                console.log(element);
                                if(element.value == 'ACT' && estado == 'ACT'){
                                    element.selected = true;
                                }else if(element.value == 'INA' && estado == 'INA'){
                                    element.selected = true;
                                }
                            });
                            
                        }
                        let imagenCliente = document.querySelector('#imagen-cliente');
                        console.log(imagen)
                        imagenCliente.src = 'data:image/jpeg;base64,'+imagen;
                        if(imagenCliente.src == 'data:image/jpeg;base64,'){
                            imagenCliente.style.display = 'none';
                        }
                        
                    })
                });
            });
        })
    }

    cancelar(boton){
        boton.addEventListener(click, function(e){
            e.preventDefault();
            mostrar(variablesCajas.cajaConsulta,variablesCajas.cajaBusqueda,variablesCajas.tablaConsulta,variablesCajas.cajaEditar);
        });
    }
};


export function mostrar(caja1, caja2, caja3, caja4){
    caja1.classList.toggle('cambio');
    caja2.classList.toggle('cambio');
    caja3.classList.toggle('cambio');
    caja4.classList.toggle('cambio');
}



export function barraBusqueda(input){
    input.addEventListener('input', function(e){
        let datos = document.querySelectorAll('.datos');
        let texto = e.target.value.toLocaleLowerCase();
        datos.forEach(function(dato){
            let mostrar = false;
            let spans = dato.querySelectorAll('span');
            spans.forEach(function(span){
                let textSpan = span.textContent.toLocaleLowerCase();
                if(textSpan.includes(texto)){
                    mostrar = true;
                }
            }); 
            if(mostrar){
                dato.style.display = 'grid';
            }else{
                dato.style.display = 'none';
            };
        });
    });
}