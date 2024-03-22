<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    require("../../../controller/controllerUpdates/controllerUpdate.php");
    require("../../../controller/controllerQuerys/controllerQuery.php");
    $update = new ControllerUpdate();
    $query = new ControllerQuery();
    $datosJason = file_get_contents('php://input');
    $dato = json_decode($datosJason, true);
    $datos = array();
    $mensaje = array('mensaje'=>'Correctyo');

    if($_POST){
        echo json_encode($mensaje);
    }else if($dato){
        $query->datosCompletosUsuario($dato['id']);
    }else{
        $response = array("mensaje" => "incorrecto");
        echo json_encode($response);
    }
}else{
    $response = array("mensaje" => "incorrecto");
    echo json_encode($response);
}
        