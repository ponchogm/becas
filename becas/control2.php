<?
     $link = new mysqli('localhost','root','umce123','alumnos_dae');
if (!$link)
  {
  die('Imposible conectar a la base de datos: ' . mysqli_error($link));
  }
     
     /* El query valida si el usuario ingresado existe en la base de datos. Se utiliza la función
     htmlentities para evitar inyecciones SQL. */
     $myusuario =$link->query("select rut_alum from alumnos where rut_alum =  '".htmlentities($_POST["rut"])."'");
     $nmyusuario = mysqli_num_rows($myusuario);
     //var_dump($_POST);
     //var_dump($myusuario->fetch_array(MYSQLI_ASSOC));
     // break;
     $rut=htmlentities($_POST["rut"]);
    // var_dump($nmyusuario); 
    // break;
     //Si existe el usuario, validamos también la contraseña ingresada y el estado del usuario...
     if($nmyusuario == 1){
                   
               session_start();
               $_SESSION["autentica"] = "YEP";
               header ("Location: becas.php?var=$rut");
          
     }else{
          echo"<script>alert('El usuario no existe.');window.location.href=\"index.html\"</script>";
     }
     break;
     //mysqli_close($link);
?>
