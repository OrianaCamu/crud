<?php
mysqli_report(MYSQLI_REPORT_OFF);
$conexion = @new mysqli ("localhost", "root", "", "crudphp");

if($conexion->connect_error){
    die("No se logro conectar".$conexion->connect_error);
}