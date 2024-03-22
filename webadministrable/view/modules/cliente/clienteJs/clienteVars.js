let ruta = 'modules/cliente/cliente.module.php';


export function cliente(){
    let datos = {
        mesnaje: 'mensaje'
    }
    fetch(ruta, {
        method: 'POST',
        body: JSON.stringify(datos)
    }).then(respuesta =>{
        if(!respuesta.ok){
            console.log("Error");
        }else{
            return respuesta.json()
        }
    }).then(datos=>{
        let html =  `
        <div class="caja-perfil">
        <div class="caja-imagen">
            <div class="sub-imagen">
                <img src="data:image/jpeg;base64,${datos[7]}" alt="">
            </div>
            <div class="sub-info">
                <p>${datos[0]}</p>
                <p>${datos[1]}</p>
                <p>${datos[2]}</p>
                <p>${datos[3]}</p>
                <p>${datos[4]}</p>
                <p>${datos[5]}</p>
                <p>${datos[8]}</p>
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
        document.querySelector('.cliente').innerHTML = html;
        let imagenes = document.querySelectorAll('#imagen');
        validarImagen(imagenes);


        let dias = document.querySelectorAll('#dia');

        dias.forEach((dia)=>{
        let valorDia = dia.dataset.value;
        dia.addEventListener('click', function(){
                window.location.href = './index.php?rutina&dia='+valorDia;
            });
        });
        console.table(datos);
    })

}

function validarImagen(imagenes){
    imagenes.forEach(imagen=>{
        if(imagen.src == 'data:image/jpeg;base64,'){
            imagen.src = './uploads/img/pika.png'
        }
    })
}


