<?php
include_once '../modelo/proyecto.php';
session_start();

$funcion = $_POST['funcion'];
if ($funcion == "buscar_proyectos_by_user") {
    $proyecto = new proyecto();
    $proyecto->listarProyectos($_SESSION["id_usuario"]);
    echo json_encode($proyecto->objeto);
}

if ($funcion == "detalles_pro") {
    $id = $_POST["id"];
    $proyecto = new proyecto();
    $proyecto->detalle_proyecto($id);
    echo json_encode($proyecto->objeto);
}

if ($funcion == "lista_transacciones") {
    $id = $_SESSION['id_usuario'];
    $proyecto = new proyecto();
    $proyecto->listarTransacciones($id);
    echo json_encode($proyecto->objeto);
}

if ($funcion == "lista_transaccionesxproyecto") {
    $id = $_POST["id"];
    $proyecto = new proyecto();
    $proyecto->listarTransaccionesxproyecto($id);
    echo json_encode($proyecto->objeto);
}
