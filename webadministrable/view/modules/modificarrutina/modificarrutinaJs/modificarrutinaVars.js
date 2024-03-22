let ruta = './modules/modificarrutina/modificarrutina.module.php';


export function rutinaCliente(objeto){
    fetch(ruta, {
        method: 'POST',
        body: JSON.stringify(objeto)
    }).then(respuesta =>{
        if(!respuesta.ok){
            console.log("Error");
        }else{
            return respuesta.json()
        }
    }).then(datos=>{
        console.table(datos);
        let contendor = document.querySelector('.caja-rutina');
        let html = '';
        console.log(datos);
        datos.forEach(dato => {
            html += `
        
            <div class="rutina-contenido">
                <div class="rutina-multimedia">
                <video controls>
                    <source src="./uploads/videos/${dato[4]}">
                </video>
                </div>
                <div class="rutina-info">
                    <p>${dato[1]}</p>
                </div>
                <button id="editar-rutina" data-descripcion="${dato[1]}" data-video="${dato[4]}" value="${dato[0]}">Editar</button>
            </div>
            `;

        contendor.innerHTML = html;
        });

        let botones = document.querySelectorAll('#editar-rutina');
        mostrarEditar(botones);
    }).catch(()=>{
        alert("dsdd")
    });
};





export function agregarRutina(form, objeto){
    form.addEventListener('submit', function(e){
        e.preventDefault();
        let carga = document.querySelector('.carga');
        carga.style.display = 'flex';
        document.querySelector('#idcliente').value = objeto.id;
        document.querySelector('#dia').value = objeto.dia;
        let formulario = new FormData(form);
        fetch(ruta, {
            method: 'POST',
            body: formulario
        }).then(respuesta =>{
            if(!respuesta.ok){
                console.log("Error");
            }else{
                return respuesta.json()
            }
        }).then(datos=>{
            carga.style.display = 'none';
            rutinaCliente(objeto);
            let cargado = document.querySelector('.cargado');
            cargado.style.display = 'flex';
            setTimeout(function(){
                cargado.style.display = 'none';
            },2000);
        });
    });
};





export function editarRutina(form, objeto){
    form.addEventListener('submit', function(e){
        e.preventDefault();
        let carga = document.querySelector('.carga');
        carga.style.display = 'flex';
        document.querySelector('#dia-editar').value = objeto.dia;
        let formulario = new FormData(form);
        fetch(ruta, {
            method: 'POST',
            body: formulario
        }).then(respuesta =>{
            if(!respuesta.ok){
                console.log("Error");
            }else{
                return respuesta.json()
            }
        }).then(datos=>{
            carga.style.display = 'none';
            let cargado = document.querySelector('.cargado');
            cargado.style.display = 'flex';
            setTimeout(function(){
                cargado.style.display = 'none';
            },2000);
            rutinaCliente(objeto);
            document.querySelector('#cancelar-editar').click();
        });
    });
};


function mostrarEditar(botones){
    botones.forEach(function(boton){
        boton.addEventListener('click', function(){
            document.querySelector(".ventana-editar").style.display = 'flex';


            let inputFileEditar = document.createElement('input');
            inputFileEditar.type = 'file';
            inputFileEditar.name = 'file-editar';
            inputFileEditar.id = 'file-editar';
            inputFileEditar.setAttribute('enctype', 'multipart/form-data');
            inputFileEditar.setAttribute('accept', '.mp4');
            document.querySelector('.archivo-editar').appendChild(inputFileEditar)

            let videoEditar = document.querySelector(".video-editar");
            let videoE = document.createElement('video');

            videoE.className = 'video-perfil video-perfil-editar';
            videoE.setAttribute('controls', '');
            let source = document.createElement('source');
            source.src = "./uploads/videos/"+boton.dataset.video;
            source.id = 'recurso-editar';
        
            videoEditar.appendChild(videoE);
            videoE.appendChild(source);

            let iFileEditar = document.querySelector('#file-editar');
            let cajaVideoEditar = document.querySelector('.video-editar');

            preVideoEditar(iFileEditar, cajaVideoEditar);
            document.querySelector('#descripcion-editar').value = boton.dataset.descripcion;
            document.querySelector('#idrutina').value = boton.value;
        });
    });     
};

export function mostrarCrear(boton){
    boton.addEventListener('click', function(){
        document.querySelector(".ventana-crear").style.display = 'flex';
    })
}

export function ocultarCrear(boton){
    boton.addEventListener('click', function(e){
        e.preventDefault();
        document.querySelector(".ventana-crear").style.display = 'none';
    });
}

export function ocultarEditar(boton){
    boton.addEventListener('click', function(e){
        e.preventDefault();
        document.querySelector(".ventana-editar").style.display = 'none';
        document.querySelector('.video-perfil-editar').remove();
        document.querySelector('.archivo-editar').querySelector('#file-editar').remove()
    });
}



export function archivoEditarClick(boton){
    boton.addEventListener('click', function(){
        document.querySelector('#file-editar').click();
    })
}

export function archivoCrearClick(boton){
    boton.addEventListener('click', function(){
        document.querySelector('#file').click();
    })
}

export function titulo(titulo, objeto)  {
    titulo.textContent = objeto.dia;
}






function preVideoEditar(video, boxVideo){
    console.log(video, boxVideo);
    video.addEventListener('change', function(e){
        let archivo = e.target.files[0];
        let videoE = document.createElement('video');
        videoE.className = 'video-perfil video-perfil-editar';
        videoE.setAttribute('controls', '');
        let source = document.createElement('source');
        let url = URL.createObjectURL(archivo);
        source.src = url;
        source.id = 'recurso-editar';
    
        if(document.querySelector('.video-perfil-editar')){
            document.querySelector('.video-perfil-editar').remove();
        }
        boxVideo.appendChild(videoE);
        videoE.appendChild(source)
    })
}

export function preVideo(video, boxVideo){
video.addEventListener('change', function(e){
    let archivo = e.target.files[0];
    let videoE = document.createElement('video');
    videoE.className = 'video-perfil';
    videoE.setAttribute('controls', '');
    let source = document.createElement('source');
    let url = URL.createObjectURL(archivo);
    source.src = url;
    source.id = 'recurso';

    if(document.querySelector('.video-perfil')){
        document.querySelector('.video-perfil').remove();
    }

    boxVideo.appendChild(videoE);
    videoE.appendChild(source)
})
};
