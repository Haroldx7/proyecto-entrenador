<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST) {
        require("../../../controller/controllerUpdates/controllerUpdate.php");
        $update = new ControllerUpdate();
        $rol = 2;
        $estado = 'ACT';

        if (isset($_FILES['file']['tmp_name']) && $_FILES['file']['tmp_name'] != '') {
            $imagen = $_FILES['file']['tmp_name'];
            $tipo = exif_imagetype($imagen);

            switch ($tipo) {
                case IMAGETYPE_JPEG:
                    $iamgenGD = imagecreatefromjpeg($imagen);
                    break;
                case IMAGETYPE_PNG:
                    $iamgenGD = imagecreatefrompng($imagen);
                    break;
                default:
                    die("Formato no valido");
            }
            $nuevaImagen = imagescale($iamgenGD, 200, 200);
            ob_start();
            imagejpeg($nuevaImagen);
            $datosImagen = ob_get_clean();
          

            $datos = array($_POST['nombres'], $_POST['apellidos'], $_POST['correo'], $_POST['contrasena'], $_POST['etiqueta'], $rol, $datosImagen, $estado);
            $update->agregar($datos);
        }else{
            $datos = array($_POST['nombres'], $_POST['apellidos'], $_POST['correo'], $_POST['contrasena'], $_POST['etiqueta'], $rol, $estado);
            $update->agregar($datos);
        }
    } else {
        $response = array('mensaje' => 'correcto');
        echo json_encode($response);
    }
} else {
    $response = array('mensaje' => 'incorrecto');
    echo json_encode($response);
}
