<?php
include('../conectar.php');
include('../seguridad3.php');
$becas=$_GET['var2'];
$rut=$_GET['var'];

$pregunta = $con->query("SELECT * FROM alumnos, carreras WHERE rut_alum ='$rut' and cod_carrera_alum = codigo_car");
            $fil = $pregunta->fetch_array(MYSQLI_ASSOC);
            $ap_pat_alum = $fil['ap_pat_alum'];
            $ap_mat_alum = $fil['ap_mat_alum'];
            $nombres = $fil['nombres_alum'];
            $sexo = $fil['sexo_alum'];
            $nombre = $nombres." ".$ap_pat_alum." ".$ap_mat_alum;
            $postula = $fil['postula_beca_alum'];
            $correo = $fil['correo_alum'];
            $telefono = $fil['telefono_alum'];
            $fecha = $fil['fecha_postula'];
            $carrera = $fil['nombre_car'];
            $newDate = date("d/m/Y", strtotime($fecha));
            //$fecha2=date_fomat('d-m-Y', $fecha);

//echo 'Has escogido la beca:"'.$becas.'" ';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Impresión de formulario</title>
	<link href="bootstrap/css/bootstrap.css" rel="stylesheet"><link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
    <!-- Javascript para agregar campos en forma dinámica Luis García 2013 -->
    <link rel="shortcut icon" href="../assets/ico/favicon.png">

    <script type="text/javascript">
      function printDiv(imprimir) {
       var contenido= document.getElementById(imprimir).innerHTML;
       var contenidoOriginal= document.body.innerHTML;

       document.body.innerHTML = contenido;

       window.print();

       document.body.innerHTML = contenidoOriginal;
      }
    </script>
  </head>

  <body>

  <div class="navbar navbar-fixed-top">
    <div class="navbar-inner">
      <div class="container">
        <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </a>
        <a class="brand" href="#">Beneficios</a>
        <!--
        <ul class="nav pull-right">
          <li><a href="salir2.php">| Salir del formulario</a></li>
        </ul>
        -->
      </div>
    </div><!-- /navbar-inner -->
  </div><!-- /navbar -->
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      h4.page-header{
        display: block;
        width: 100%;
        padding: 0;
        margin-bottom: 20px;
        font-size: 21px;
        line-height: 40px;
        color: #333;
        border: 0;
        border-bottom: 1px solid #E5E5E5;
        font-weight: normal;
      }
    </style>  
</head>
<body>
	<div class="container" id="container">

      <!-- Cabecera del formulario -->
      <div id="form">
      <div class="row-fluid">
        <p>
        <p>  
        <div class="span2">&nbsp;</div>
        <div class="span8" style="text-align:center"><h3>Postulación a Becas Internas 2018</h3></div>
        <div class="span2">&nbsp;</div>
      </div>
      <div class="row-fluid">
        <div class="span2">&nbsp;</div>
        <div class="span8" style="text-align:center"><img src="bootstrap/img/Logo_umce.jpg" class="img-rounded"></div>
        <div class="span2">&nbsp;</div>
      </div>
      <p>
      <p>
      <div class="row-fluid">
      </br>
        <div span style="color:red"><center><h7><strong>Tu postulación NO HA CONCLUIDO.</strong></h7></center></div>
        <p>
        <div>
        <p>
        <p>
          <ul>
        Debes imprimir este formulario y presentarlo en Bienestar Estudiantil, junto a:
        <li>Fotocopia de tu cédula de identidad vigente</li>
        
        <li>Cartola de Registro Social de Hogares.</li>
        
        </ul>
      </div>

      <p>
      <p>
        <table class="table table-striped table-bordered">
          <tr>
            <td>Rut: <?php echo $rut; ?></td>
            <td>Nombre: <?php echo $nombre; ?></td> 
            <td>Fecha de postulación: <?php echo $newDate; ?></td> 
          </tr>
          <tr>
            <td colspan="2">Correo: <?php echo $correo; ?></td> 
            <td>Teléfono: <?php echo $telefono; ?></td> 
          </tr>
          <tr>
            <td colspan="3"><?php echo $carrera; ?></td> 
          </tr>
          <tr>
            <td colspan="3">Beca a la que postula: <strong><?php echo $postula; ?></strong></td>
          </tr>
        </table>
      </br>
    </div>
	</div>
      <center><button type='submit' class='btn btn-primary' onclick="printDiv('form')">Imprimir</button></center>
<p>
<p>
      <div class="row-fluid">
        <div class="span2">&nbsp;</div>
        <div class="span8" style="text-align:center"><a href="salir3.php">Salir</a></div>
        <div class="span2">&nbsp;</div>
      </div>
      
	</div>
</body>
</html>