<?php
/*
Script para insertar datos desde un archivo a una base de datos MySQL
Escrito por Luis García Manzo.
UMCE 2013
*/
set_time_limit(180);// tiempo de carga de archivo (mientras mas grande el archivo hay que poner un tiempo mas largo (esta expresado en segundos))

// Conexión a la base de datos
$mysqli = new mysqli('localhost','root','umce123','becas2017');
if ($mysqli->connect_errno) {
    echo "Fallo al contenctar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "\n";

//introduce los datos a la base

 $filas=file('base_dae2017.csv');
 $i=0;

 $total=count($filas);
 echo "Total filas : ".$total."<BR>";

 while ($i < $total) {
     $row=$filas[$i];
     $sql=explode(";", $row);// Separador de columnas para insertar en la base de datos

	 $mysqli->query("INSERT INTO estudiantes (rut, ap_pat, ap_mat, nombre_one, nombre_two, sexo, dia_nac, mes_nac, anio_nac, cod_car, nombre_car, anio_ing, estado_acad, sit_acad) VALUES ('$sql[0]','$sql[1]','$sql[2]','$sql[3]','$sql[4]','$sql[5]','$sql[6]','$sql[7]','$sql[8]','$sql[9]','$sql[10]','$sql[11]','$sql[12]','$sql[13]')");// Insersión en la base de datos

	echo "Se inserto fila : ".$i."<BR>";// Mensaje al terminar
     $i++;

   }

?>