<?php
include ('seguridad3.php');
include ('../conectar.php');
$rut=$_GET['var'];

//$rut="18486804-0";

$pregunta = $con->query("SELECT * FROM alumnos WHERE rut_alum ='$rut'");
            $fil = $pregunta->fetch_array(MYSQLI_ASSOC);
            $ap_pat_alum = $fil['ap_pat_alum'];
            $ap_mat_alum = $fil['ap_mat_alum'];
            $nombres = $fil['nombres_alum'];
            $sexo = $fil['sexo_alum'];
            $nombre = $nombres." ".$ap_pat_alum." ".$ap_mat_alum;
            $postula = $fil['postula_beca_alum'];
?>

<!DOCTYPE html>
<html lang="es">
  <head>
    
    <meta charset="utf-8">
    <title>Beneficios - Universidad Metropolitana de Ciencias de la Educación</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Le styles -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
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
      .ctrl_mio{
            float: none;
      }
      .izq{
        float:left;
      }
    </style>
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
                    <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
    <!-- Javascript para agregar campos en forma dinámica Luis García 2013 -->
    <link rel="shortcut icon" href="../assets/ico/favicon.png">
    <script type="text/javascript">
      function activa(){
        document.getElementById('becas').style.display = 'inline';
        document.getElementById('modifica').style.display = 'none';
        document.getElementById('enviar').style.display = 'inline';
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

    <div class="container">

      <!-- Cabecera del formulario -->
      <div class="row-fluid">
        <div class="span2"><img src="bootstrap/img/Logo_umce.jpg" class="img-rounded"></div>
        <div class="span8" style="text-align:center"><h3>Postulación a Becas Internas 2018</h3></div>
        <div class="span2"><img src="bootstrap/img/Logo_dae.jpg" class="img-rounded"></div>
      </div>
        <p>
      <!-- Comienzo del formulario UMCE por Luis García Manzo -->
      <center>
      <form name="alumnos_dae" method="post" action="insertaBecas.php?var=<? echo $rut; ?>"
      <div class="izq span12">
        <legend><?php if($sexo=='M'){echo "Bienvenido:";}else{echo "Bienvenida:";}?> <?php echo utf8_encode($nombre); ?>, seleccione la alternativa a la cual desea postular</legend>
        <div class="controls ctrl_mio">
          <br>
          <br>  
          <br>
          <?php if($postula ==""):?>
          <h6>Recuerde que solo puede postular a una beca de las aquí listadas</h6>
              <select name='becas' class='span4'>
                 <option value='No postula'>No deseo postular</option>
                 <option value='Beca de estudios'>Beca de estudios</option>
                 <option value='Beca de almuerzo'>Beca de almuerzo</option>
          </select>
          </div>
          <div class="controls ctrl_mio">
            <h6>Ingresa tu correo y teléfono.</h6>
            <input type="text" name="correo" required placeholder="correo@mimail.com" />
            <input type="text" name="telefono" maxlength="12" required value="+569" />
          </div>
                 <br>
                    <button type='submit' class='btn btn-primary'>Enviar Formulario</button>
          <?php endif; ?> 
          <?php if($postula !=""):?>
              <!-- -->

              Usted ya ingresó la opción: <strong><?php echo $postula; ?></strong>
              <p>
              <p>
                <center><a href="res.php?var=<?php echo $rut;?>" target="blank">Imprimir Postulación</a></center>
              </br></br>
              <select id='becas' name='becas' class='span4' style="display:none">
                 <option value='No postula'>No deseo postular</option>
                 <option value='Beca de estudios'>Beca de estudios</option>
                 <option value='Beca de almuerzo'>Beca de almuerzo</option>
              </select>
              <p>
              <button type='button' id='modifica' class='btn btn-primary' onclick="activa();">Modificar Postulación</button>
              <button type='submit' id='enviar' class='btn btn-primary' style="display:none">Reingresar Postulación</button>
              </br>
              </br>
              </br>
              <a href='salir3.php'>Salir</a>
          <?php endif; ?>  
      </form>
      </center>

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
    <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script>

  </body>
</html>
