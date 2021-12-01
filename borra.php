<?php
session_start();
if(isset($_SESSION['nombreusu']))
{
	$cod_pro = $_GET['cod_pro'];
	$mysqli = new mysqli("localhost", "root", "", "web");		
	$sql = $mysqli->query("delete from productos where cod_pro='$cod_pro'");
	echo "
	<script>
	alert('Producto eliminado');
	</script>";

	echo"<META HTTP-EQUIV='Refresh' CONTENT='0; URL=listar.php'>";
}
else
	{
			echo "<script language='javascript'> alert('No Tiene Permisos'); </script>";
			echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=index.php'>";
	}		 

?>