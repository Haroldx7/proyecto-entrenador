import {Login, Register, Peticiones} from './loginVars.js'
let peticion = new Peticiones();

let login = document.querySelector('.login');
peticion.login(login);


customElements.define('login-element', Login);
customElements.define('register-element', Register);