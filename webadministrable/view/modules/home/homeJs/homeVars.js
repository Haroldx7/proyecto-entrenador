

            
export function mostarInfoHome(imagen, texto, fondo){
    let ruta = './modules/home/home.module.php';
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
        console.log(datos)
        let imagen64 = 'data:image/jpeg;base64,'+datos[0];
        let textoValor = datos[1];
        let fondo64 = 'data:image/jpeg;base64,'+datos[2];

        imagen.src = imagen64;
        texto.innerHTML = textoValor;
        fondo.style.backgroundImage = `url(${fondo64})`;

        console.log(datos);
    });
}


