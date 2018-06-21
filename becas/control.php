<?
     /* A continuación, realizamos la conexión con nuestra base de datos en MySQL */
     $link = mysql_connect("localhost","root","umce123");
     mysql_select_db("alumnos_dae", $link);

     /* El query valida si el usuario ingresado existe en la base de datos. Se utiliza la función
     htmlentities para evitar inyecciones SQL. */
     $myusuario = mysql_query("select rut_alum from alumnos where rut_alum =  '".htmlentities($_POST["rut"])."'",$link);
     $nmyusuario = mysql_num_rows($myusuario);

     //Si existe el usuario, validamos también la contraseña ingresada y el estado del usuario...
     if($nmyusuario != 0){
          $sql = "select rut_alum from alumnos where rut_alum = '".htmlentities($_POST["rut"])."'
          and fecha_nac = '".(htmlentities($_POST["fecha_nac"]))."'";
          $myclave = mysql_query($sql,$link);
          $nmyclave = mysql_num_rows($myclave);
          //Si el usuario y clave ingresado son correctos (y el usuario está activo en la BD), creamos la sesión del mismo.
          if($nmyclave != 0){
               session_start();
               //Guardamos dos variables de sesión que nos auxiliará para saber si se está o no "logueado" un usuario
               $_SESSION["autentica"] = "YEP";
               $_SESSION["usuarioactual"] = mysql_result($myclave,0,0); //nombre del usuario logueado.
               //Direccionamos a nuestra página principal del sistema.
               $rut=$_POST['rut'];

               /*$cons=mysql_query("SELECT * FROM alumnos WHERE rut_alum ='$rut'", $link);//Condicional para ingreso de rezagados :)

               while($row = mysql_fetch_assoc($cons)){

                    $dir=$row['direccion_alum'];
               }
               if($dir == ''){*/

               header ("Location: beca.php?var=$rut");
          /*}else{
               echo"<script>alert('Usted ya ha ingresado sus datos. No puede hacerlo nuevamente!');
               window.location.href=\"index.php\"</script>";
          }*/
          }
          else{
               echo"<script>alert('La contrase\u00f1a del usuario no es correcta.');
               window.location.href=\"sesion2.php\"</script>";
          }
     }else{
          echo"<script>alert('El usuario no existe.');window.location.href=\"index.php\"</script>";
     }
     mysql_close($link);
?>
