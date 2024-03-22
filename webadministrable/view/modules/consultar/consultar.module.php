<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require("../../../controller/controllerUpdates/controllerUpdate.php");
    require("../../../controller/controllerQuerys/controllerQuery.php");
    $update = new ControllerUpdate();
    $query = new ControllerQuery();
    $dataJson = file_get_contents('php://input');
    $dato = json_decode($dataJson,true);
    
    if($_POST && isset($_POST['consultar'])){
        $datos = array($_POST['nombres'], $_POST['correo'], $_POST['etiqueta'], $_POST['estado']);
        $query->consultaDetallesUsuario($datos);
    }else if(isset($dato['mensaje'])){
        $query->consultarUsuario($dato);
    }else if(isset($dato['consulta'])){
        $query->datosCompletosUsuario($dato['idUsuario']);
    }else if($_POST && isset($_POST['editar'])){

        
        
        if(isset($_FILES['file']) && $_FILES['file']['tmp_name'] != null){
            var_dump($_FILES['file']);
            print("fdfddffddf");
            $imagen = $_FILES['file']['tmp_name'];
            $tipo = exif_imagetype($imagen);

            switch($tipo){
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
            $datos = array($_POST['nombres'], $_POST['apellidos'],$_POST['correo'], $_POST['contrasena'], $_POST['etiqueta'], $_POST['rol'], $datosImagen,$_POST['estado'], $_POST['idusuario']);

        }else{
            $datos = array($_POST['nombres'], $_POST['apellidos'],$_POST['correo'], $_POST['contrasena'], $_POST['etiqueta'], $_POST['rol'],$_POST['estado'], $_POST['idusuario']);

        }
        $update->editar($datos);

    }else{
        $response = array('mensaje' => 'incorrecto no es el dato '.$dato);
        echo json_encode($response);
    }
}else{
    $response = array('mensaje' => 'incorrecto');
    echo json_encode($response);
}
