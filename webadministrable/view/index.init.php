<?php 
$data = json_decode(file_get_contents("php://input"), true);
$response = array("mensaje" => "Correcto");



echo json_encode($response);


