<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require("../../../controller/controllerQuerys/controllerQuery.php");
    $query = new ControllerQuery();

    if($_POST){
        $query->login($_POST['etiqueta'], $_POST['contrasena']);
    }else{
        $response = array("mensaje" => "incorrecto");
        echo json_encode($response);
    }

}else{
    $response = array("mensaje" => "incorrecto");
    echo json_encode($response);
}

            