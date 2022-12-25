<?php
session_start();
require "conexion.php";
?>



<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD PHP MYSQL</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
     <div class="container">
          <?php
          if (isset($_SESSION['mensaje'])){
              if (!$_SESSION['error']){
                    ?>
                    <div class="alert alert-success" role="alert">
                    <?php echo $_SESSION['mensaje'];?>
                    </div>
              <?php
              }else{
                    ?>
                    <div class="alert alert-danger" role="alert">
                    <?php echo $_SESSION['mensaje'];?>
                    </div>
              <?php
              }
              unset($_SESSION['mensaje']);
              unset($_SESSION['error']);
          }
          
          ?>




       <div class="row">
        <div class="col-md-12">
           <div class="card">
            <div class="card-header">
                <h4>
                    Lista de Profesionales
                    <a href="crear_medicos.php" class="btn btn-success float-end">Agregar nuevo</a>
                </h4>
            </div>
               <div class="card-body">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>EDAD</th>
                    <th>ESPECIALIDAD</th>
                    <th>PAIS</th>
                    <th>ACCIONES</th>
                    
                  </tr>
                  <?php
                               $res= $conexion->query("SELECT M.*, P.nombre as pais FROM `medicos` M INNER JOIN paises P ON P.id= M.id_pais");
                               while ($fila = $res->fetch_object()){
                                ?>
                              <tr>
                                 <td><?php echo $fila->id; ?></td>
                                 <td><?php echo $fila->nombre; ?></td>
                                 <td><?php echo $fila->apellido; ?></td>
                                 <td><?php echo $fila->edad; ?></td>
                                 <td><?php echo $fila->especialidad; ?></td>
                                 <td><?php echo $fila->pais; ?></td>
                                 <td>
                                   <a href="editar_medicos.php?id=<?php echo md5($fila->id); ?>" class="btn btn-primary">
                                    Editar
                                   </a>
                                   <a href="detalle_medicos.php?id=<?php echo md5($fila->id); ?>" class="btn btn-success">
                                    Ver
                                   </a>

                                   <form action="guardar.php" method= POST class= "d-inline">
                                    <button class= "btn btn-danger" type= "submit" name= "btnEliminar" value="=<?php echo md5($fila->id); ?>" >
                                      Eliminar
                                    </button>
                                   </form>
                               
                               
                                 </td>
                              </tr>
                              
                              <?php

                               }

                            ?>
                 
                </thead>
              </table>
               </div>
           </div>
        </div>
       </div>
     </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>