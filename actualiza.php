<?php

session_start();

	$mysqli = new mysqli("localhost", "root", "", "web");	
	
	$cod_pro = $_POST['cod_pro'];
	$nombre = $_POST['nombre'];
	$precio =  $_POST['precio'];
	$stock =  $_POST['stock'];	
	$modelo =  $_POST['modelo'];
	$marca =  $_POST['marca'];
	$sql = $mysqli->query("update productos set nombre='$nombre', precio='$precio',stock='$stock',modelo='$modelo',marca='$marca' where cod_pro=$cod_pro");
?>	

	 <SCRIPT LANGUAGE="javascript"> 
         alert("Producto actualizado"); 
     </SCRIPT> 
     <META HTTP-EQUIV="Refresh" CONTENT="0; URL=listar.php">


