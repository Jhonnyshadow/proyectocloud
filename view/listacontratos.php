<!DOCTYPE html>
<?php
require_once '../model/Contrato.php';
require_once '../model/Salarios.php';
require_once '../model/Obreros.php';
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CONTRATO</title>
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
            </section>
        <div class="container">
            <div class="text-center" >
                <h3 style="font-size: 72px; font-family: initial; color: #fff">CONTRATOS</h3>

            </div>
         <div class="panel panel-primary">
                    <div    class=" panel-heading"><b>INGRESO DATOS CONSTRUCCION</b></div>
                    <div class=" panel-body">
        <table data-toggle="table">
            <thead>
                <tr>
                    <th>CEDULA</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>INICIO CONTRATO</th>
                    <th>FIN CONTRATO</th>
                    <th>OFICIO</th>
                    <th>CODIGO CONTRATO</th>
                    <th>OPCIONES</th>

                </tr>
            </thead>
            <tbody>
                <?php
                //verificamos si existe en sesion el listado de clientes:
                if (isset($_SESSION['listaObreros'])) {
                    $listado1 = unserialize($_SESSION['listaObreros']);
                      if (isset($_SESSION['listaContrato'])) {
                    $listado = unserialize($_SESSION['listaContrato']);
                    
                    foreach ($listado1 as $facturaDet1) {
                    foreach ($listado as $facturaDet) {
                        if ($facturaDet1->getCod_contrato()==$facturaDet->getCodigo_contrato()) {
                        echo "<tr>";
                        echo "<td>" . $facturaDet1->getCedula() . "</td>";
                        echo "<td>" . $facturaDet1->getNombre() . "</td>";
                        echo "<td>" . $facturaDet1->getApellido() . "</td>";
                        echo "<td>" . $facturaDet->getInicio_contrato() . "</td>";
                        echo "<td>" . $facturaDet->getFin_contrato() . "</td>";
                        echo "<td>" . $facturaDet->getOficio() . "</td>";
                        echo "<td>" . $facturaDet->getCodigo_contrato() . "</td>";
                        echo "<td><a href='../controller/controller.php?opcion=eliminar_contrato&codigo_contrato=" . $facturaDet->getCodigo_contrato() . "'>ELIMINAR</a></td>";
                        echo "</tr>";
                        }
                    }
                    }
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
