<!DOCTYPE html>
<?php
require_once '../model/Obreros.php';
require_once '../model/Contrato.php';
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>OBREROS</title>
        <script src="js/jquery-2.1.4.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/bootstrap-table.js"></script>
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-table.css" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"><link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    </head>
    <body style="background-image: linear-gradient(
             rgba(0, 0, 0, 0.5), 
             rgba(0, 0, 0, 0.5)
             ), url('images/banner.png'); background-attachment: fixed;background-position: center;background-repeat: no-repeat;">
        <section>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#" >
        <span class="fas fa-hammer" style="font-size: 30px"> HAMMERCONST</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="../view/index.php">INICIO <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../controller/controller.php?opcion=listar_contratos">CONTRATOS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../controller/controller.php?opcion=listar_salarios">SALARIOS</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="../controller/controller.php?opcion=listar_construcciones">CONSTRUCCIONES</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="../controller/controller.php?opcion=listar_trabajo">TRABAJO</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="../controller/controller.php?opcion=listar_obreros">DATOS OBRERO</a>
      </li>
    </ul>
  </div>
           
</nav>
        <div class="container">
            <div class="container">
            <div class="text-center" >
                <h3 style="font-size: 72px; font-family: initial; color: #fff">OBREROS</h3>

            </div>
            <p>
            <form action="../controller/controller.php">
                <input type="hidden" name="opcion" value="crear_obrero">
                 <div class="panel panel-primary">
                    <div    class=" panel-heading"><b>INGRESO DATOS CONSTRUCCION</b></div>
                    <div class=" panel-body">
                <table>
                    <tr><td> CEDULA:</td><td><input class="form-control" type="text" name="cedula" required="true" autocomplete="off" required="" value=""></td></tr>
                 <tr><td>NOMBRE:</td><td><input class="form-control" type="text" name="nombre" required="true" autocomplete="off" required="" value=""></td></tr>
                 <tr><td>APELLIDO:</td><td><input class="form-control" type="text" name="apellido" required="true" autocomplete="off" required="" value=""></td></tr>
                 <tr><td>DIRECCION:</td><td><input class="form-control" type="text" name="direccion" required="true" autocomplete="off" required="" value=""></td></tr>
                 <tr><td>HIJOS:</td><td><input class="form-control" type="text" name="hijos" required="true" autocomplete="off" required="" value=""></td></tr>
                </table>

                <input class="btn btn-success" type="submit" value="Crear">
                    </div>
                 </div>
            </form>
        </p>
         <div class="panel panel-primary">
                    <div    class=" panel-heading"><b>INGRESO DATOS CONSTRUCCION</b></div>
                    <div class=" panel-body">
        <table data-toggle="table">
            
            <thead>
                <tr>
                    <th>CEDULA</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>DIRECCION</th>
                    <th>HIJOS</th>
                    <th>CONTRATO</th>
                    <th colspan="2">OPCIONES</th>

                </tr>
            </thead>
            <tbody>
                <?php
                //verificamos si existe en sesion el listado de clientes:
                if (isset($_SESSION['listaObreros'])) {
                    $listado = unserialize($_SESSION['listaObreros']);
                    foreach ($listado as $facturaDet) {
                        echo "<tr>";
                        echo "<td>" . $facturaDet->getCedula() . "</td>";
                        echo "<td>" . $facturaDet->getNombre() . "</td>";
                        echo "<td>" . $facturaDet->getApellido() . "</td>";
                        echo "<td>" . $facturaDet->getDireccion() . "</td>";
                        echo "<td>" . $facturaDet->getNhijos() . "</td>";
                        if ($facturaDet->getCod_contrato() == "") {
                            
                           echo "<td><a href='../controller/controller.php?opcion=redireccionar&cedula=" . $facturaDet->getCedula() . "'>CREAR CONTRATO</a></td>";
                        } else {
                            echo "<td>" . $facturaDet->getCod_contrato() . "</td>";
                        }

                        echo "<td><a href='../controller/controller.php?opcion=cargar_obrero&cedula=" . $facturaDet->getCedula() ."&cod_contrato=".$facturaDet->getCod_contrato(). "'>EDITAR</a></td>";
                        echo "<td><a href='../controller/controller.php?opcion=eliminar_obrero&cedula=" . $facturaDet->getCedula() . "'>ELIMINAR</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "No se han cargado datos.";
                }
                ?>
            </tbody>
        </table>
                    </div></div>
    </div>
</body>

</html>
