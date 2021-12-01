
<?php

session_start();
if(isset($_SESSION['nombreusu']))
{
	$cod_pro = $_GET['cod_pro'];
	echo "<input type=hidden name='cod_pro' id='cod_pro' value='$cod_pro'>";
	$mysqli = new mysqli("localhost", "root", "", "web");		

	echo "
	<script>
		let sino=confirm('¿Desea eliminar? $cod_pro');
		if(sino==true)
		{
			 
			document.location.href='borra.php?cod_pro=$cod_pro';
			
		}

	</script>
		";
	echo"<META HTTP-EQUIV='Refresh' CONTENT='0; URL=listar.php'>";
}
else
	{
			echo "<script language='javascript'> alert('No Tiene Permisos'); </script>";
			echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=index.php'>";
	}		 

?>