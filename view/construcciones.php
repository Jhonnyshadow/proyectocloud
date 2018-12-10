<!DOCTYPE html>
<?php
require_once '../model/construcciones.php';
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CONSTRUCCIONES</title>
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
            <div class="text-center" >
                <h3 style="font-size: 72px; font-family: initial; color: #fff">CONSTRUCCIONES</h3>

            </div>
            
            <p>
            <form action="../controller/controller.php">
                <input type="hidden" name="opcion" value="crear_construccion">
                <div class="panel panel-primary">
                    <div    class=" panel-heading"><b>INGRESO DATOS CONSTRUCCION</b></div>
                    <div class=" panel-body">
                        <table>
                            <tr><td>CODIGO CONSTRUCCION:</td><td><input class="form-control" type="text" name="cod_edificio" maxlength="50" required="true"></td></tr>
                            <tr><td> NOMBRE CONSTRUCCION:</td><td><input class="form-control" type="text" name="nombre_construccion" maxlength="50" required="true"></td></tr>
                            <tr><td>DIRECCION :</td><td><input class="form-control" type="text" name="direccion" maxlength="50" required="true"></td></tr>
                            <tr><td>INICIO CONSTRUCCION:</td><td><input class="form-control" type="date" name="fecha_inicio" required="true" autocomplete="off" required="" value="<?php echo date('Y-m-d'); ?>"></td></tr>
                 <tr><td>ENTREGA COSNTRUCCION:</td><td><input class="form-control" type="date" name="fecha_entrega" required="true" autocomplete="off" required="" value="<?php echo date('Y-m-d'); ?>"></td></tr>
                            <tr><td> <input class="btn btn-success" type="submit" value="crear"></td></tr>
                        </table>
                    </div>
                </div>
            </form>
        </p>
        <div class="panel panel-info">
            <div    class=" panel-heading"><b>LISTA CONSTRUCCIONES</b></div>
            <div class=" panel-body">
                <table data-toggle="table">

                    <thead>
                        <tr>
                            <th><center>CODIGO_CONSTRUCCION</center></th>
                    <th><center>NOMBRE_CONSTRUCCION</center></th>
                    <th><center>DIRECCION</center></th>
                    <th><center>INICIO CONSTRUCCION</center></th>
                    <th><center>ENTREGA CONSTRUCCION</center></th>
                    <th><center>OPCIONES</center></th>
                    <th><center>OPCIONES</center></th>


                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        //verificamos si existe en sesion el listado de clientes:
                        if (isset($_SESSION['listaConstrucciones'])) {
                            $listado = unserialize($_SESSION['listaConstrucciones']);

                            foreach ($listado as $facturaDet) {
                                echo "<tr>";
                                echo "<td>" . $facturaDet->getCod_edificio() . "</td>";
                                echo "<td>" . $facturaDet->getNombre_construccion() . "</td>";
                                echo "<td>" . $facturaDet->getDireccion() . "</td>";
                                echo "<td>" . $facturaDet->getFecha_inicio() . "</td>";
                                echo "<td>" . $facturaDet->getFecha_entrega() . "</td>";
                                echo "<td><a href='../controller/controller.php?opcion=cargar_construccion&cod_edificio=" . $facturaDet->getCod_edificio() . "'>EDITAR</a></td>";
                                echo "<td><a href='../controller/controller.php?opcion=eliminar_construccion&cod_edificio=" . $facturaDet->getCod_edificio() . "'>ELIMINAR</a></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "No se han cargado datos.";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
