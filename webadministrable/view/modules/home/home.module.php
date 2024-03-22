<?php 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    require("../../../controller/controllerUpdates/controllerUpdate.php");
    require("../../../controller/controllerQuerys/controllerQuery.php");
    $update = new ControllerUpdate();
    $query = new ControllerQuery();
    $datosJason = file_get_contents("php://input");
    $dato = json_decode($datosJason, true);
    $mensaje = array("mensaje"=>"Correcto");
            
    if($_POST){

        $imagen = $_FILES['imagen']['tmp_name'];
        $tipoI = exif_imagetype($imagen);

        switch($tipoI){
            case IMAGETYPE_JPEG:
                $iamgenGDI = imagecreatefromjpeg($imagen);
            break;
            case IMAGETYPE_PNG:
                $iamgenGDI = imagecreatefrompng($imagen);
            break;
            default:
            die("Formato no valido");
        }
        $nuevaImagen = imagescale($iamgenGDI, 500, 500);
        ob_start();
        imagejpeg($nuevaImagen);
        $datosImagen = ob_get_clean();

        
        $fondo = $_FILES['fondo']['tmp_name'];
        $datosFondo = file_get_contents($fondo);
        $datos = array($datosImagen, $_POST['texto'], $datosFondo);
        $update->home($datos);  
    }else if($dato){
        $query->consultaHome();
    }else{
        $response = array("mensaje" => "incorrecto");
        echo json_encode($response);
    }
}else{
    $response = array("mensaje" => "incorrecto");
    echo json_encode($response);
}
        