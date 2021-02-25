<?php
include_once '../baseDeDatos/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT T1.ID_CLIENTE, T1.NOMBRE, T1.CARGO, T1.DEPENDENCIA, T1.EMAIL, T1.MOVIL, T1.ESTADO,
T2.TIPO_CONTACTO, T2.DESTINATARIO, T2.ASUNTO, T2.RESUMEN, T2.FECHA_CONTACTO, T2.FECHA_PC, T2.NOMBRE_CONTACTO, T2.ACUERDO, T3.NOMBRE_PU FROM contacto T2
INNER JOIN clientes T1 ON T2.ID_CLIENTE = T1.ID_CLIENTE
INNER JOIN publicidad T3 ON T2.ID_PUBLICIDAD = T3.ID_PUBLICIDAD";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;
?>