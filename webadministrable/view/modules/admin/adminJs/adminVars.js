let click = 'click';
            
export class Navegar{
    identificar(boton){
        let c = boton.id;
        this.asingnar(boton, c);
    }

    asingnar(e,a){
        e.addEventListener(click, this.navegar(a))
    }

    navegar(e){
        return () =>{
            this.peticion(e);
        }
    }
    
    
    peticion(e){
        let saludo = {
            mensaje:'mensaje'
        }
        fetch('./modules/admin/admin.module.php',{
            method: 'POST',
            body: JSON.stringify(saludo)
        }).then(respuesta =>{
            if(!respuesta.ok){
                console.log("Error")
            }else{
                return respuesta.json();
            }
        }).then(datos =>{
            let ruta = './index.php?'+e;
            window.location.href = ruta;
        });
    }
}




