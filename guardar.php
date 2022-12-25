<?php
session_start();
require 'conexion.php';

if (isset($_POST["btnGuardar"])){
    $nombre = mysqli_real_escape_string($conexion,$_POST['nombre']);
    $apellido = mysqli_real_escape_string($conexion,$_POST['apellido']);
    $edad = mysqli_real_escape_string($conexion,$_POST['edad']);
    $especialidad = mysqli_real_escape_string($conexion,$_POST['especialidad']);
    $pais = mysqli_real_escape_string($conexion,$_POST['pais']);


    $sql = "INSERT INTO medicos (nombre,apellido,edad,especialidad,id_pais) values
    ('$nombre', '$apellido', '$edad', '$especialidad', '$pais')";
   
    $res = $conexion->query($sql);
    if ($res){
        $_SESSION['mensaje'] = "Medico registrado correctamente";
        $_SESSION['error'] = false;
     
    }else{
        $_SESSION['mensaje'] = "No se logro registrar medico correctamente";
        $_SESSION['error'] = true;
    }
    header ("location:crear_medicos.php");
        exit;


    }else if (isset($_POST["btnEliminar"])){
        $id = mysqli_real_escape_string($conexion,$_POST['btnEliminar']);
     
    
    
        $sql = "delete from medicos WHERE md5(id)='$id'";
       
        $res = $conexion->query($sql);
        if ($res){
            $_SESSION['mensaje'] = "Registro eliminado correctamente";
            $_SESSION['error'] = false;
         
        }else{
            $_SESSION['mensaje'] = "No se logro eliminar el registro correctamente";
            $_SESSION['error'] = true;
        }
        header ("location:index.php");
            exit;
        }else if (isset($_POST["btnActualizar"])){
            $id = mysqli_real_escape_string($conexion,$_POST['id']);
            $nombre = mysqli_real_escape_string($conexion,$_POST['nombre']);
            $apellido = mysqli_real_escape_string($conexion,$_POST['apellido']);
            $edad = mysqli_real_escape_string($conexion,$_POST['edad']);
            $especialidad = mysqli_real_escape_string($conexion,$_POST['especialidad']);
            $pais = mysqli_real_escape_string($conexion,$_POST['pais']);
        
        
            $sql = "UPDATE medicos SET nombre='$nombre' ,apellido='$apellido' ,edad= '$edad',especialidad='$especialidad' ,id_pais='$pais' WHERE md5(id)='$id'";
           
            $res = $conexion->query($sql);
            if ($res){
                $_SESSION['mensaje'] = "Registro actualizado correctamente";
                $_SESSION['error'] = false;
             
            }else{
                $_SESSION['mensaje'] = "No se logro actualizar registro correctamente";
                $_SESSION['error'] = true;
            }
            header ("location:index.php");
                exit;
            }
    




?>