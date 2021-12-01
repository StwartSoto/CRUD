	<?php
	
			$mysqli = new mysqli("localhost", "root", "", "web");	
			$cod_pro = $_GET['cod_pro'];
			$nombre = $_GET['nombre'];
			$precio = $_GET['precio'];						
			$stock = $_GET['stock'];						
			$modelo = $_GET['modelo'];						
			$marca = $_GET['marca'];						
			$sql = $mysqli->query("insert into productos (cod_pro,nombre,precio,stock,modelo,marca) values ('$cod_pro', $nombre, '$precio','$stock','$modelo','$marca') ");			
	?>	
		    <SCRIPT LANGUAGE="javascript"> 
            alert("Producto registrado"); 
            </SCRIPT> 
            <META HTTP-EQUIV="Refresh" CONTENT="0; URL=listar.php">
