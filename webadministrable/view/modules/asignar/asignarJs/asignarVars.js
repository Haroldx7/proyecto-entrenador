let ruta = 'modules/asignar/asignar.module.php';

export function mostrarclientes(){
    let mensaje = {
        mesnaje: 'correcto'
    }
    fetch(ruta,{
        method: 'POST',
        body: JSON.stringify(mensaje)
    }).then(respuesta =>{
        if(!respuesta.ok){
            console.log("Error")
        }else{
            return respuesta.json();
        }
    }).then(datos =>{
        let contendor = document.querySelector('.subcontenedor');
        let html = '';
        datos.forEach(dato => {
            console.log(datos)
            html += `
            <div class="carta-cliente">
            <div class="imagen-cliente">
                <div class="caja-imagen">
                <img id="imagen" src="data:image/jpeg;base64,${dato[6]}" alt="">
                </div>
            </div>
            <div class="info-cliente">
                <p>${dato[0]}</p>
                <p>${dato[1]}</p>
                <p>${dato[2]}</p>
                <p>${dato[3]}</p>
                <p>${dato[4]}</p>
                <p>${dato[5]}</p>
                <p>${dato[7]}</p>

            </div>
            <button id="btn-cliente" value="${dato[0]}">rutina</button>
        </div>
            `;
        });
        contendor.innerHTML = html;
        let clientea = document.querySelectorAll('#btn-cliente');
        let imagenes = document.querySelectorAll('#imagen');
        botones(clientea);
        validarImagen(imagenes);
    });
};


function validarImagen(imagenes){
    imagenes.forEach(imagen=>{
        if(imagen.src == 'data:image/jpeg;base64,'){
            imagen.style.display='none';
        }
    })
}

export function botones(clienteBotones){
    clienteBotones.forEach(boton=>{
        boton.addEventListener('click', function(){
            let ruta1 = 'modules/asignar/asignar.module.php';
            let valor = this.value;
        
            let saludo = {
                mensaje: 'correcto'
            }
            fetch(ruta1,{
                method: 'POST',
                body: JSON.stringify(saludo)
            }).then(respuesta =>{
                if(!respuesta.ok){
                    console.log("Error")
                }else{
                    return respuesta.json();
                }
            }).then(datos =>{
                let ruta = './index.php?colocarrutina&idcliente='+valor;
                window.location.href = ruta;
            });
        })
    });
}