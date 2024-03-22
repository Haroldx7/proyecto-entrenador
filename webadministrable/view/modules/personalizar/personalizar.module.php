<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require("../../../controller/controllerUpdates/controllerUpdate.php");
    require("../../../controller/controllerQuerys/controllerQuery.php");
    $update = new ControllerUpdate();
    $query = new ControllerQuery();
    $datosJason = file_get_contents("php://input");
    $dato = json_decode($datosJason, true);
    $mensaje = array("mensaje" => "Correcto");

    if ($_POST) {

        $datos = array();
        if (isset($_FILES['imagen']) && $_FILES['imagen']['tmp_name'] != null) {
            $imagen = $_FILES['imagen']['tmp_name'];
            $tipoI = exif_imagetype($imagen);

            switch ($tipoI) {
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
            $datos['imagen'] = $datosImagen; 
        }

        if($_POST['texto'] != null){
            $datos['texto'] = $_POST['texto'];
        }


        if(isset($_FILES['fondo']) && $_FILES['fondo']['tmp_name'] != null){
            $fondo = $_FILES['fondo']['tmp_name'];
            $datosFondo = file_get_contents($fondo);
            $datos['fondo'] = $datosFondo;
        }

       
        // $datos = array($datosImagen, $_POST['texto'], $datosFondo);
        $update->home($datos);
    } else if ($dato) {
        $query->consultaHome();
    } else {
        $response = array("mensaje" => "incorrecto");
        echo json_encode($response);
    }
} else {
    $response = array("mensaje" => "incorrecto");
    echo json_encode($response);
}
