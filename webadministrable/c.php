<?php 

$argumento  = $argv[1];

$creado = true;
$rutaActual = __DIR__.'/view'.'/modules'.'/'.$argumento;
mkdir($rutaActual);

$carpetas = [
    $argumento.'Js',
];

foreach($carpetas as $carpeta){
    $rutaCarpeta = $rutaActual.'/'.$carpeta;
    if(!file_exists($rutaCarpeta)){
        mkdir($rutaCarpeta);
    }else{
        $creado = false;
    }
};

$archivosJs = [
    $argumento.'.js',
    $argumento.'Vars.js',
];


foreach($archivosJs as $archivoJs){
    $rutaJS = $rutaCarpeta.'/'.$archivoJs;
    if(!file_exists($rutaJS)){
        if(pathinfo($archivoJs, PATHINFO_BASENAME) == $argumento.'.js'){
            file_put_contents($rutaJS, "import {} from './".$argumento."Vars.js'");
        }else if(pathinfo($archivoJs, PATHINFO_BASENAME) == $argumento.'Vars.js'){
            file_put_contents($rutaJS, "

let click = 'click';
let ruta = './modules/".$argumento."/".$argumento.".module.php';
let datos= {
    saludo: 'hola'
}
fetch(ruta, {
    method: 'POST',
    body: JSON.stringify(datos)
}).then(respuesta =>{
    if(!respuesta.ok){
        console.log('Error');
    }else{
        return respuesta.json()
    }
}).then(datos=>{
    console.log(datos);
});");
        }
    }else{
        $creado = false;
    }

}


$archivos = [
    $argumento.'.php',
    $argumento.'.module.php',
    $argumento.'.css',
];


foreach($archivos as $archivo){
    $rutaArchivo = $rutaActual.'/'.$archivo;
    if(!file_exists($rutaArchivo)){
        if(pathinfo($rutaArchivo, PATHINFO_BASENAME) == $argumento.'.php'){
            file_put_contents($rutaArchivo,'<head>
    <link rel="stylesheet" href="./modules/'.$argumento.'/'.$argumento.'.css">
</head>
<div class="'.$argumento.'">
    <h1>Bienvenido al mudulo '.$argumento.'</h1>
</div>
    <script type="module" src="./modules/'.$argumento.'/'.$argumento.'Js/'.$argumento.'.js"></script>
');
        }else if(pathinfo($rutaArchivo, PATHINFO_BASENAME) == $argumento.'.module.php'){
            file_put_contents($rutaArchivo,'<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    require("../../../controller/controllerUpdates/controllerUpdate.php");
    require("../../../controller/controllerQuerys/controllerQuery.php");
    $update = new ControllerUpdate();
    $query = new ControllerQuery();
    $datosJason = file_get_contents("php://input");
    $dato = json_decode($datosJason, true);
    $datos = array();
    $mensaje = array("mensaje"=>"Correcto");
            
    if($_POST){
        echo json_encode($mensaje);
    }else if($dato){
        echo json_encode($mensaje);
            
    }else{
        $response = array("mensaje" => "incorrecto");
        echo json_encode($response);
    }
}else{
    $response = array("mensaje" => "incorrecto");
    echo json_encode($response);
}
        ');
        }else if(pathinfo($rutaArchivo, PATHINFO_BASENAME) == $argumento.'.css'){
            file_put_contents($rutaArchivo,'.'.$argumento.'{
    background-color: rgb(16, 43, 96);
    width: 100%;
    height: auto;
    min-height: 70vh;
    display: grid;
    place-content: center;
}');
        }
    }else{
        $creado = false;
    }
}

if($creado){
    echo "Se creo el modulo:".$argumento;
}else{
    echo "No se creo el modulo:".$argumento." ya existe";
}

