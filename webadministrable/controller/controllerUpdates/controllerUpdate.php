<?php
require_once("../../../model/conexion.php");
class ControllerUpdate extends Conexion
{
    private $modelo;
    private $mensaje;
    public function __construct()
    {
        parent::__construct();
        $this->modelo = $this->model;
        $this->mensaje = [];
    }

    public function agregar($datos)
    {

        if (count($datos) >= 8) {
            $sql = 'INSERT INTO usuario(nomusu,apeusu,corusu,conusu,etiusu,rolusu,imagen,estado) 
            VALUES(?,?,?,?,?,?,?,?)';
            $stmt = $this->modelo->prepare($sql);
            $stmt->bind_param('ssssssss', $datos[0], $datos[1], $datos[2], $datos[3], $datos[4], $datos[5], $datos[6], $datos[7]);
            $this->mensaje = array("mensaje" => "Correddddddcto");

            if ($stmt->execute()) {
                $stmt->close();
                echo json_encode($this->mensaje);
            }
        } else {
            $sql = 'INSERT INTO usuario(nomusu,apeusu,corusu,conusu,etiusu,rolusu,estado) 
            VALUES(?,?,?,?,?,?,?)';
            $stmt = $this->modelo->prepare($sql);

            $stmt->bind_param('sssssss', $datos[0], $datos[1], $datos[2], $datos[3], $datos[4], $datos[5], $datos[6]);
            $this->mensaje = array("mensaje" => "Correcto");
            if ($stmt->execute()) {
                $stmt->close();
                echo json_encode($this->mensaje);
            }
        }
    }

    public function editar($datos)
    {
        if (count($datos) >= 9) {
            $sql = 'UPDATE usuario SET nomusu = ?, apeusu = ?, corusu = ?, 
            conusu = ?, etiusu = ?, rolusu = ?, imagen = ?,estado = ? WHERE idusuario = ?';
            $stmt = $this->modelo->prepare($sql);
            $stmt->bind_param('sssssssss', $datos[0], $datos[1], $datos[2], $datos[3], $datos[4], $datos[5], $datos[6], $datos[7], $datos[8]);
        } else {
            $sql = 'UPDATE usuario SET nomusu = ?, apeusu = ?, corusu = ?, 
            conusu = ?, etiusu = ?, rolusu = ?,estado = ? WHERE idusuario = ?';
            $stmt = $this->modelo->prepare($sql);
            $stmt->bind_param('ssssssss', $datos[0], $datos[1], $datos[2], $datos[3], $datos[4], $datos[5], $datos[6], $datos[7]);
        }

        if ($stmt->execute()) {
            $respuesta = array('mensaje' => 'correcto');
            echo json_encode($respuesta);
        }
    }


    public function agregarRutina($datos)
    {
        $sql = 'INSERT INTO rutina(descripcion,dia,idusuario,video) VALUES(?, ?, ?, ?)';
        $stmt = $this->modelo->prepare($sql);
        $stmt->bind_param('ssss', $datos[0], $datos[1], $datos[2], $datos[3]);
        if ($stmt->execute()) {
            $respuesta = array('mensaje' => 'correcto');
            echo json_encode($respuesta);
        }
    }

    public function editarRutina($datos)
    {
        if (isset($datos[1]) && $datos[1] != null) {
            $sql = 'UPDATE rutina SET descripcion = ?, video = ?, estado = ? WHERE  dia = ? AND idrutina = ?';
            $stmt = $this->modelo->prepare($sql);
            $stmt->bind_param('sssss', $datos[0], $datos[1], $datos[2], $datos[3], $datos[4]);
            if ($stmt->execute()) {
                $respuesta = array('mensaje' => 'correcto');
                echo json_encode($respuesta);
            }
        } else {
            $sql = 'UPDATE rutina SET descripcion = ?, estado = ? WHERE  dia = ? AND idrutina = ?';
            $stmt = $this->modelo->prepare($sql);
            $stmt->bind_param('ssss', $datos[0], $datos[2], $datos[3], $datos[4]);
            if ($stmt->execute()) {
                $respuesta = array('mensaje' => 'correcto');
                echo json_encode($respuesta);
            }
        }
    }

    public function home($datos)
    {

        if(isset($datos['imagen']) && isset($datos['texto']) && isset($datos['fondo'])){
            $sql = 'UPDATE home SET imagen = ?,  texto = ?,  fondo = ?';
            $stmt = $this->model->prepare($sql);
            $stmt->bind_param('sss', $datos['imagen'], $datos['texto'], $datos['fondo']);
        }else if(isset($datos['imagen']) && isset($datos['texto'])){
            $sql = 'UPDATE home SET imagen = ?,  texto = ?';
            $stmt = $this->model->prepare($sql);
            $stmt->bind_param('ss', $datos['imagen'], $datos['texto']);
        }else if(isset($datos['fondo']) && isset($datos['texto'])){
            $sql = 'UPDATE home SET   texto = ?, fondo = ?';
            $stmt = $this->model->prepare($sql);
            $stmt->bind_param('ss', $datos['texto'], $datos['fondo']);
        }else{
            $sql = 'UPDATE home SET   texto = ?';
            $stmt = $this->model->prepare($sql);
            $stmt->bind_param('s', $datos['texto']);
        }

        if ($stmt->execute()) {
            $respuesta = array('mensaje' => 'correcto');
            echo json_encode($respuesta);
        }
    }
}
