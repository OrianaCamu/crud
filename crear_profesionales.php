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
          }
          
          ?>




       <div class="row">
        <div class="col-md-12">
           <div class="card">
            <div class="card-header">
                <h4>
                    Registrar medico
                    <a href="index.php" class="btn btn-danger float-end">Regresar</a>
                </h4>
            </div>
               <div class="card-body">
                <form action ="guardar.php" method ="post">
                  <div class="mb-3">
                        <label for="">Nombre medico</label>
                        <input type = "text" name= "nombre" class= "form-control">
                  
                  </div>

                  <div class="mb-3">
                        <label for="">Apellido medico</label>
                        <input type = "text" name= "apellido" class= "form-control">
                  
                  </div>

                  <div class="mb-3">
                        <label for="">Edad medico</label>
                        <input type = "number" name= "edad" class= "form-control">
                  
                  </div>

                  <div class="mb-3">
                       <label for="">Especialidad medico</label>
                       <input type = "text" name= "especialidad" class= "form-control">
                  
                  </div>

                  <div class="mb-3">
                       <label for="">Pais</label>
                          <select name="pais" id=" " class="form-select">
                            <option value="">Seleccione un pais </option>
                            <?php
                               $res= $conexion->query("SELECT * FROM `paises` order by nombre");
                               while ($fila = $res->fetch_object()){
                                ?>
                                <option value="<?php echo $fila->id; ?>"><?php echo $fila->nombre; ?> </option>
                            <?php

                               }

                            ?>


                          </select>
                  </div>

                  <div class="mb-3">
                     <button type= "submit" name="btnGuardar" class="btn btn-primary"> Guardar medico </button>
                  
                  </div>







                </form>
               </div>
           </div>
        </div>
       </div>
     </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>