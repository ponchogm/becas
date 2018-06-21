<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pagina Principal</title>
</head>

<body>
<p>Páginas Dinámicas </p>
<table width="800" border="1">
  <tr>
    <td width="15%"><p><a href="index.php">Inicio</a></p>
    <p><a href="index.php?page=pagina1">Enlace 1</a></p>
    <p><a href="index.php?page=pagina2">Enlace 2</a></p>
    </td>
    <td> 
    <?php 
		if(isset($_GET['page'])){
			$page = $_GET['page'];
			include("seccion1/".$page.".php");
			}
			else 
				echo "Pagina Principal";
			
	?>
    </td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>