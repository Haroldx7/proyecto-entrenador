export class Navegar{
    identificar(boton){
        let c = boton.id;
        this.asiganar(boton, c);
    }

    asiganar(e,a){
        e.addEventListener('click', this.navegar(a));
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
        fetch('./index.init.php',{
            method:'POST',
            body: JSON.stringify(saludo)
        }).then(response =>{
            if(!response.ok){
                console.log("MAl")
            }else{
                return response.json();
            }
        }).then(data =>{
            let ruta = './index.php?'+e;
            window.location.href = ruta;
            console.log(data);
        })
    }
    
}






