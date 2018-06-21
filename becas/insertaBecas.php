<?php
include('../conectar.php');
$becas=$_POST['becas'];
$correo=$_POST['correo'];
$telefono=$_POST['telefono'];
$rut=$_GET['var'];
//echo $becas;
//echo $rut;
//break;
//Inserta datos del alumno
$guardabeca="UPDATE alumnos SET postula_beca_alum ='$becas', correo_alum = '$correo', telefono_alum = '$telefono', fecha_postula = now() WHERE rut_alum = '$rut'";
if (!mysqli_query($con,$guardabeca))
  {
  die('Error: ' . mysqli_error($con));
  }

mysqli_close($con);
echo"<script>alert('Beca Insertada.');window.location.href=\"http://beneficios.umce.cl/becas/res.php?var=$rut&var2=$becas\"</script>";
?>