



export function mostarInfoHome(){
    let ruta = './modules/personalizar/personalizar.module.php';
    let consulta = {
        consulta: 'consulta'
    }
    fetch(ruta, {
        method: 'POST',
        body: JSON.stringify(consulta)
    }).then(respuesta =>{
        if(!respuesta.ok){
            console.log('Error');
        }else{
            return respuesta.json()
        }
    }).then(datos=>{
        let imagen = document.querySelector('#imagen-prevista');
        let texto = document.querySelector('#texto');
        let fondo = document.querySelector('#fondo-prevista');
        imagen.src = '';
        texto.value ='';
        fondo.src = '';

        imagen.src = 'data:image/jpeg;base64,'+datos[0];
        texto.value = datos[1];
        fondo.src = 'data:image/jpeg;base64,'+datos[2]
    });
}

export function personalizar(personalizacion, imagen, texto, fondo){
    personalizacion.addEventListener('click', function(){
        let formData = new FormData();
        formData.append('imagen', imagen.files[0]);
        formData.append('texto', texto.value);
        formData.append('fondo', fondo.files[0]);
        let ruta = './modules/personalizar/personalizar.module.php';
        fetch(ruta, {
            method: 'POST',
            body: formData
        }).then(respuesta =>{
            if(!respuesta.ok){
                console.log('Error');
            }else{
                return respuesta.json()
            }
        }).then(datos=>{
            mostarInfoHome();
            window.location.href = 'index.php?home';
        });
    });
    
}



export function iamgenPrevista(cajaImagen, imagen){
    cajaImagen.addEventListener('click', function(){
        imagen.click();
        imagen.addEventListener('change', function(e){
            cajaImagen.innerHTML = '';
            let archivo = e.target.files[0];
            let ruta = URL.createObjectURL(archivo);
            let img = document.createElement('img');
            img.id = 'imagen-prevista';
            img.src = ruta;
            cajaImagen.appendChild(img);
            console.log("rfdfdsf    ")
        })
    })
}

export function fondoPrevista(cajaFondo, fondo){
    cajaFondo.addEventListener('click', function(){
        fondo.click();
        fondo.addEventListener('change', function(e){
            cajaFondo.innerHTML = '';
            let archivo = e.target.files[0];
            let ruta = URL.createObjectURL(archivo);
            let img = document.createElement('img');
            img.id = 'fondo-prevista';
            img.src = ruta;
            cajaFondo.appendChild(img);
            console.log("rfdfdsf")
        })
    })
}

