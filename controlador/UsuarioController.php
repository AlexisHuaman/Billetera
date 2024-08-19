<?php
include_once '../modelo/usuario.php';
$usuario = new usuario();
if($_POST['funcion']=='buscar_usuario'){
    $json=array();
    $usuario->obtener_datos($_POST['dato']); 
    foreach ($usuario->objetos as $objeto){
        $json[]=array(
            'nombre'=>$objeto->nombre_us,
            'apellido'=>$objeto->apellido_us,
            'edad'=>$objeto->edad_us,
            'dni'=>$objeto->dni_us,
            'contrasena'=>$objeto->contrasena_us,
            'telefono'=>$objeto->telefono_us,
            'residencia'=>$objeto->residencia_us,
            'correo'=>$objeto->correo_us,
            'sexo'=>$objeto->sexo_us,
            'adicional'=>$objeto->adicional_us
        );
    }
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
}

if($_POST['funcion']=='capturar_datos'){
    $json=array();
    $id_usuario=$_POST['id_usuario'];
    $usuario->obtener_datos( $id_usuario); 
    foreach ($usuario->objetos as $objeto){
        $json[]=array(
            'telefono'=>$objeto->telefono_us,
            'residencia'=>$objeto->residencia_us,
            'correo'=>$objeto->correo_us,
            'sexo'=>$objeto->sexo_us,
            'adicional'=>$objeto->adicional_us
        );
    }
    $jsonstring = json_encode($json[0]);
    echo $jsonstring;
}

if($_POST['funcion']=='editar_usuario'){
    $id_usuario=$_POST['id_usuario'];
    $telefono=$_POST['telefono'];
    $residencia=$_POST['residencia'];
    $correo=$_POST['correo'];
    $sexo=$_POST['sexo'];
    $adicional=$_POST['adicional'];
    $usuario->editar($id_usuario,$telefono,$residencia,$correo,$sexo,$adicional); 
    echo 'editado';
}
?>