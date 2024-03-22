export function doc(elemento){
    return document.querySelector(elemento);
}
export function eve(variable, evento, parametro){
    return variable.addEventListener(evento, peticion(parametro));
}
export let click = 'click';
            
function peticion(e){
    return function(){
        alerta(e);
    }
}