export let click = 'click';


export class Agregar{
    agregarDatos(form){
        form.addEventListener('submit', function(e){
            e.preventDefault();
            let datosForm = new FormData(form);
            let ruta = './modules/agregar/agregar.module.php';
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
                window.location.href = 'index.php?admin'
                console.log(datos);
            });
        })
    }
}



export function msotarImagen(file, contenedor){
    file.addEventListener('change', function(e){
        let archivo = e.target.files[0];
        let ruta = URL.createObjectURL(archivo);
        let imagen = document.createElement('img');
        imagen.src = ruta;
        contenedor.innerHTML = '';
        contenedor.appendChild(imagen);
    });
}



export function imagenPerfil(cajaPerfil, file){
    cajaPerfil.addEventListener('click', function(){
        file.click();
    })
}



function validar(){

}