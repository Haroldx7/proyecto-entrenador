<?php 
ini_set('post_max_size', '500M');
if($_SERVER["REQUEST_METHOD"] == "POST"){
    require("../../../controller/controllerUpdates/controllerUpdate.php");
    require("../../../controller/controllerQuerys/controllerQuery.php");
    $update = new ControllerUpdate();
    $query = new ControllerQuery();
    $datosJason = file_get_contents("php://input");
    $datos = json_decode($datosJason, true);
    $mensaje = array("mensaje"=>"Correcto");
    if($_FILES && isset($_FILES['file'])){
        $directorio = "../../../view/uploads/videos/";
        $nombreVideo = $_FILES['file']['name'];
        $rutaCompleta = $directorio . $nombreVideo;
        move_uploaded_file($_FILES['file']['tmp_name'], $rutaCompleta);
        $datosForm = array($_POST['descripcion'], $_POST['dia'],$_POST['idcliente'], $nombreVideo);
        $update->agregarRutina($datosForm);
    }else if($_FILES && isset($_FILES['file-editar'])){
        $directorio = "../../../view/uploads/videos/";
        $nombreVideo = $_FILES['file-editar']['name'];
        $rutaCompleta = $directorio . $nombreVideo;
        move_uploaded_file($_FILES['file-editar']['tmp_name'], $rutaCompleta);
        $datosForm = array($_POST['descripcion'], $nombreVideo, $_POST['estado'],$_POST['dia'],$_POST['idrutina']);
        $update->editarRutina($datosForm);
    }else if($datos){
        $query->rutina($datos);            
    }else{
        $response = array("mensaje" => "incorrecto");
        echo json_encode($response);
    }
}else{
    $response = array("mensaje" => "incorrecto");
    echo json_encode($response);
}
        