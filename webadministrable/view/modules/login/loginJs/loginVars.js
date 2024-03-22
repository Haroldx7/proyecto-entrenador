let ruta = 'modules/login/login.module.php';
export let click = 'click';


export class Peticiones{
    login(login){
        login.addEventListener('submit', function(e){
            e.preventDefault();
            let datos = new FormData(login);
            fetch(ruta, {
                method: 'POST',
                body: datos
            }).then(respuesta =>{
                if(!respuesta.ok){
                    console.log("Error")
                }else{
                    return respuesta.json();
                }
            }).then(datos=>{
                if(!datos.mensaje){
                    window.location.href = 'index.php?'+datos.pagina;
                }else{
                    alert(datos.mensaje)

                }

            })
        })
    }
}




export class Login extends HTMLElement{
    constructor(){
        super();
        this.attachShadow({ mode: 'open'})
        this.shadowRoot.innerHTML = `
        <style>
            form{
                background: red;
            }
        </style>
        <form action="" class="login">
            <input type="text">
            <input type="text">
            <input type="submit">
        </form>
        `;
    }
}

export class Register extends HTMLElement{
    constructor(){
        super();
        this.attachShadow({ mode: 'open'})
        this.shadowRoot.innerHTML = `
        <form action="" class="register">
            <input type="text">
            <input type="text">
            <input type="text">
            <input type="text">
            <input type="submit">
        </form>
        `;
    }
}