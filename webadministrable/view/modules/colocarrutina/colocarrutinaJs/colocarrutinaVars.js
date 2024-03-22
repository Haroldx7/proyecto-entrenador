let ruta = './modules/colocarrutina/colocarrutina.module.php';


export function mostarCliente(idcliente){
    fetch(ruta,{
        method: 'POST',
        body: JSON.stringify(idcliente)
    }).then(respuesta =>{
        if(!respuesta.ok){
            console.log("error")
        }else{
            return respuesta.json();
        }
    }).then(dato=>{
        let contendor = document.querySelector('.colocarrutina');
        let html = `
        <div class="caja-perfil">
        <div class="caja-imagen">
            <div class="sub-imagen">
                <img id="imagen" src="data:image/jpeg;base64,${dato[7]}" alt="">
            </div>
            <div class="sub-info">
                <p>${dato[0]}</p>
                <p>${dato[1]}</p>
                <p>${dato[2]}</p>
                <p>${dato[3]}</p>
                <p>${dato[4]}</p>
                <p>${dato[5]}</p>
                <p>${dato[8]}</p>
                
            </div>
        </div>

        <div class="caja-rutina">
            <div class="sub-rutina">
                <span class="dia" id="dia" data-value="lunes">Lunes</span>
                <span class="dia" id="dia" data-value="martes">Martes</span>
                <span class="dia" id="dia" data-value="miercoles">Miercoles</span>
                <span class="dia" id="dia" data-value="jueves">Jueves</span>
                <span class="dia" id="dia" data-value="viernes">Viernes</span>
                <span class="dia" id="dia" data-value="sabado">Sabado</span>
                <span class="dia" id="dia" data-value="domingo">Domingo</span>
            </div>
        </div>
    </div>

        
        `;
        contendor.innerHTML = html;
        let imagenes = document.querySelectorAll('#imagen');
        validarImagen(imagenes);


        let dias = document.querySelectorAll('#dia');

        dias.forEach((dia)=>{
        let valorDia = dia.dataset.value;
        dia.addEventListener('click', function(){
                window.location.href = './index.php?modificarrutina&idcliente='+idcliente.id+'&dia='+valorDia;
            });
        });
    });
}

function validarImagen(imagenes){
    imagenes.forEach(imagen=>{
        if(imagen.src == 'data:image/jpeg;base64,'){
            imagen.src = './uploads/img/pika.png'
        }
    })
}