let ruta = './modules/rutina/rutina.module.php';


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
            </div>
            `;
        });
        contendor.innerHTML = html;

    }).catch(()=>{
        alert("dsdd")
    });
};