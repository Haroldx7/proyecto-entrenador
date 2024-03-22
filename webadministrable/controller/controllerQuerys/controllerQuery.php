<?php 
require_once("../../../model/conexion.php");
class ControllerQuery extends Conexion{
    private $modelo; 
    private $mensaje;
    

    public function __construct(){
        parent::__construct();
        $this->modelo = $this->model;
        
        $this->mensaje = [];
    }

    public function login($etiquetaI, $contrasenaI){    
        
        $sql = 'SELECT * FROM usuario WHERE etiusu = ? AND conusu = ?';
        $stmt = $this->modelo->prepare($sql);
        $stmt->bind_param('ss', $etiquetaI, $contrasenaI);
        if($stmt->execute()){
            $idusuario= $nombre= $apellido= $correo= $contrasena= $etiqueta= $rol= $imagen=$estado = null;
            $stmt->bind_result($idusuario, $nombre, $apellido, $correo, $contrasena, $etiqueta, $rol, $imagen,$estado);
            $stmt->store_result();
            $stmt->fetch();
            $stmt->close();
            session_start();
            $_SESSION['usuario'] = [
                'id'=>$idusuario,
                'nombre'=>$nombre,
                'rol'=>$rol
            ];
            if($_SESSION['usuario']['rol'] == 1){
                $this->mensaje = array("id" => $idusuario,"nombre"=> $nombre, "pagina"=>'admin');
                echo json_encode($this->mensaje);
            }else if($_SESSION['usuario']['rol'] == 2){
                $this->mensaje = array("id" => $idusuario,"nombre"=> $nombre, "pagina"=>'cliente');
                echo json_encode($this->mensaje);
            }else{
                $this->mensaje = array("mensaje"=>"No registrado");
                echo json_encode($this->mensaje);
            }
        }
    }
    public function consultarUsuario($datos){
        $sql = "SELECT * FROM usuario WHERE 1=1";
        $stmt = $this->modelo->prepare($sql);
        // if(isset($datos['nombres'])){
        //     $sql .= 'nomusu = '.$datos['nombres'].' OR ';
        // }
        // if(isset($datos['correo'])){
        //     $sql .= 'corusu = '.$datos['correo'].' OR ';
        // }
        // if(isset($datos['etiqueta'])){
        //     $sql .= 'etiqueta = '.$datos['etiqueta'].' OR ';
        // }
        // if(isset($datos['estado'])){
        //     $sql .= 'estado = '.$datos['estado'].' OR ';
        // }
        // if(!isset($datos['nombres']) && !isset($datos['correo']) && !isset($datos['etiqueta']) && !isset($datos['estado'])){
        //     $sql .= ' 1=1 ';
        // }
        
        // $sql = rtrim($sql, 'OR').';';

        if($stmt->execute()){
            $idusuario= $nombres= $apellidos= $correo= $contrasena= $etiqueta= $rol= $imagen =$estado = null;
            $stmt->bind_result($idusuario, $nombres, $apellidos, $correo, $contrasena, $etiqueta, $rol, $imagen ,$estado);
            $stmt->store_result();
            $usaurio = array();
            while($stmt->fetch()){
                $datosUsuario = [];
                $datosUsuario[] = $idusuario;
                $datosUsuario[] = $nombres." ".$apellidos;
                $datosUsuario[] = $correo;
                $datosUsuario[] = $contrasena;
                $datosUsuario[] = $etiqueta;
                $datosUsuario[] = $rol;
                $datosUsuario[] = $estado;
                $usaurio[] = $datosUsuario;
            }
            $stmt->close();
            echo json_encode($usaurio);
        }
    }

    public function consultaDetallesUsuario($datos){
        $sql = "SELECT * FROM usuario WHERE ";
        if(isset($datos[0]) && $datos[0] != null){
            $sql .= 'nomusu = '.'"'.$datos[0].'"'.' OR ';
        }
        if(isset($datos[1]) && $datos[1] != null){
            $sql .= 'corusu = '.'"'.$datos[1].'"'.' OR ';
        }
        if(isset($datos[2]) && $datos[2] != null){
            $sql .= 'etiusu = '.'"'.$datos[2].'"'.' OR ';
        }
        if(isset($datos[3]) && $datos[3] != null){
            $sql .= 'estado = '.'"'.$datos[3].'"'.' OR ';
        }
        if($datos[0] == null && $datos[1] == null && $datos[2]==null && $datos[3]==null){
            $sql .= ' 1=1 ';
        }
        $sql = rtrim($sql, ' OR ').';';

        $stmt = $this->modelo->prepare($sql);

        if($stmt->execute()){
            $idusuario= $nombres= $apellidos= $correo= $contrasena= $etiqueta= $rol= $imagen =$estado = null;
            $stmt->bind_result($idusuario, $nombres, $apellidos, $correo, $contrasena, $etiqueta, $rol, $imagen ,$estado);
            $stmt->store_result();
            $usaurio = array();
            while($stmt->fetch()){
                $datosUsuario = [];
                $datosUsuario[] = $idusuario;
                $datosUsuario[] = $nombres." ".$apellidos;
                $datosUsuario[] = $correo;
                $datosUsuario[] = $contrasena;
                $datosUsuario[] = $etiqueta;
                $datosUsuario[] = $rol;
                $datosUsuario[] = $estado;
                $usaurio[] = $datosUsuario;
            }
            $stmt->close();
            echo json_encode($usaurio);
        }
    }
    public function datosCompletosUsuario($id){
        $sql = "select * from usuario where idusuario = ?";
        $stmt = $this->modelo->prepare($sql);
        $stmt->bind_param('s', $id);
        if($stmt->execute()){
            $idusuario= $nombres= $apellidos= $correo= $contrasena= $etiqueta= $rol= $imagen=$estado=null;
            $stmt->bind_result($idusuario, $nombres, $apellidos, $correo, $contrasena, $etiqueta, $rol, $imagen,$estado);
            $stmt->store_result();
            $stmt->fetch();
            $imagen64 = base64_encode($imagen);
            $datos = array($idusuario, $nombres, $apellidos, $correo, $contrasena, $etiqueta, $rol, $imagen64,$estado);
            echo json_encode($datos);
        }
    }

    public function datosTotales(){
        $sql = "SELECT * FROM usuario where idusuario > 1 and estado = 'ACT'";
        $stmt = $this->modelo->prepare($sql);
        if($stmt->execute()){
            $idusuario= $nombres= $apellidos= $correo= $contrasena= $etiqueta= $rol= $imagen =$estado=null;
            $stmt->bind_result($idusuario, $nombres, $apellidos, $correo, $contrasena, $etiqueta, $rol, $imagen ,$estado);
            $stmt->store_result();
            $usaurio = array();
            while($stmt->fetch()){
                $datosUsuario = [];
                $datosUsuario[] = $idusuario;
                $datosUsuario[] = $nombres." ".$apellidos;
                $datosUsuario[] = $correo;
                $datosUsuario[] = $contrasena;
                $datosUsuario[] = $etiqueta;
                $datosUsuario[] = $rol;
                $datosUsuario[] = base64_encode($imagen);
                $datosUsuario[] = $estado;
                $usaurio[] = $datosUsuario;
            }
            $stmt->close();
            echo json_encode($usaurio);
        }
    }

    public function rutina($datos){
        $sql = "
        SELECT r.idusuario, r.idrutina, r.descripcion, r.dia , r.video FROM usuario u 
        INNER JOIN rutina r ON u.idusuario=r.idusuario WHERE r.idusuario = ? AND r.dia = ? AND r.estado = 'ACT'
        ";
        $stmt = $this->modelo->prepare($sql);
        $stmt->bind_param('ss', $datos['id'], $datos['dia']);
        if($stmt->execute()){
            $idusuario =$idrutina= $descripcion = $dia= $video = null;
            $stmt->bind_result( $idusuario ,$idrutina, $descripcion, $dia, $video);
            $stmt->store_result();
            $usuario = array();
            while($stmt->fetch()){
                $datosUsuario = [];
                $datosUsuario[] = $idrutina;
                $datosUsuario[] = $descripcion;
                $datosUsuario[] = $dia;
                $datosUsuario[] = $idusuario;
                $datosUsuario[] = $video;
                $usuario[] = $datosUsuario;
            }
            $stmt->close();
            echo json_encode($usuario);
        }
    }

    public function consultaHome(){
        $sql = 'SELECT * FROM home';
        $stmt = $this->modelo->prepare($sql);
        if($stmt->execute()){
            $imagen = $texto = $fondo = null;
            $stmt->bind_result($imagen, $texto, $fondo);
            $stmt->store_result();
            $stmt->fetch();
            $imagen64 = base64_encode($imagen);
            $fondo64 = base64_encode($fondo);
            $home = [$imagen64, $texto, $fondo64];
            $stmt->close();
            echo json_encode($home);
        }else{
            $mensaje = array("mensaje"=>"error");
            echo json_encode($mensaje);

        }
    }
    
}