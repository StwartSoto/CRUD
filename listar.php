<?php
	session_start();
	if(isset($_SESSION['nombreusu']))
	{
?>
<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Accesorios de Celulares y Equipos de Computo</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilos.css">	
	<script src="js/metodos.js"></script>
</head>
<style>
body
{
	background-color: black;
}
th
{
	color: white;
}
.ub1
{
text-align:left;
font-weight: bold;
color:black;
margin-bottom:0.5em;
margin-top:0.5em;
}
input
{
	width: 100%;
    padding: 0.5em;
	font-size:1em;
	border-radius:5px;
	cursor:pointer;
	border:none;
	border-bottom:0.1em solid blue;
	color:black;
	text-align:left;
	margin-bottom:1em;
}
input:hover
{
	border:none;
border-bottom:0.1em solid black;
}
input::placeholder 
{
  color: #1E265D;
  font-weight: bold;
   opacity: 0.5; 
}
input[type=submit],button[type=button]
{
border-bottom:0.1em solid #BDBFC1;
margin-top: 1em;
width:48%;
text-align:center;
background-color: black;
color:white;
cursor:pointer;
}
td
{
	color: white;
}
</style>
<body>
	<header>
		<nav class="navbar navbar-default navbar-static-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-fm">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a href="#" class="navbar-brand">LISTADO DE PRODUCTOS</a>
				</div>
				<div class="collapse navbar-collapse" id="navegacion-fm">
					
					<ul class="nav navbar-nav navbar-right">
					
				    </ul>			
				</div>
			</div>
		</nav>
	</header>
	<div class="container">
		<div class="row">		
			<a class="btn btn-primary" data-toggle="modal" data-target="#nuevoUsu">Nuevo producto</a><br><br>
			<table class='table'>
				<tr>
					<th>CODIGO PRODUCTO</th><th>NOMBRE</th><th>PRECIO</th><th>STOCK</th><th>MODELO</th><th>MARCA</th><th><span class="">Herramientas</span></th>
				</tr>			
<?php
			$mysqli = new mysqli("localhost", "root", "", "web");		
			if ($mysqli->connect_errno) 
			{
			    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
			    exit();
			}
			$consulta= "SELECT * FROM productos";
			if ($resultado = $mysqli->query($consulta)) 
			{
				while ($fila = $resultado->fetch_row()) 
				{					
					echo "<tr>";
					echo "<td>$fila[0]</td><td>$fila[1]</td><td>$fila[2]</td><td>$fila[3]</td><td>$fila[4]</td><td>$fila[5]</td>";	
					echo"<td>";						
				    echo "<a data-toggle='modal' data-target='#editUsu' 
				    	data-cod_pro	='" .$fila[0] ."' 
				    	data-nombre	='" .$fila[1] ."' 
				    	data-precio	='" .$fila[2] ."' 
				    	data-stock	='" .$fila[3] ."' 
				    	data-modelo	='" .$fila[4] ."' 
				    	data-marca  ='" .$fila[5] ."' 
				    	class='btn btn-primary'><span class='glyphicon glyphicon-edit'></span></a> ";			
					echo "<a class='btn btn-danger' href='elimina.php?dni=" .$fila[0] ."'><span class='glyphicon glyphicon-trash'></span></a>";		
					echo "</td>";
					echo "</tr>";
				}
				$resultado->close();
			}
			$mysqli->close();
?>
	        </table>
		</div> 
		<div class="modal" id="nuevoUsu" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button1" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Nuevo Producto</h4>                       
                    </div>
                    <div class="modal-body">
                       <form action="insertar.php" method="GET">              		
                       		<div class="ub1">
                       			<label for="cod_pro">Código Del Producto: </label>
                       			<input class="form-control" id="cod_pro" name="cod_pro" type="text" placeholder="Codigo Producto"></input>
                       		</div>
                       		<div class="ub1">
                       			<label for="nombre">Nombre del Producto: </label>
                       			<input class="form-control" id="nombre" name="nombre" type="text" placeholder="Nombre Producto"></input>
                       		</div>
                       		<div class="ub1">
                       			<label for="precio">Precio del Producto: </label>
                       			<input class="form-control" id="precio" name="precio" type="text" placeholder="Precio Producto"></input>
                       		</div>
                       		<div class="ub1">
                       			<label for="stock">Stock del Producto: </label>
                       			<input class="form-control" id="stock" name="stock" type="text" placeholder="Stock Producto"></input>
                       		</div>
                       		<div class="ub1">
                       			<label for="modelo">Modelo del Producto: </label>
                       			<input class="form-control" id="modelo" name="modelo" type="text" placeholder="Modelo Producto"></input>
                       		</div>
                       		<div class="ub1">
                       			<label for="marca">Marca del Producto: </label>
                       			<input class="form-control" id="marca" name="marca" type="text" placeholder="Marca Producto"></input>
                       		</div>
							<input type="submit" class="btn btn-primary" value="Grabar">
                        	<button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>
                       </form>
                    </div>
                </div>
            </div>
        </div> 

        <div class="modal" id="editUsu" tabindex="-1" role="dialog" aria-labellebdy="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button1" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4>Modificar datos</h4>
                    </div>
                    <div class="modal-body">                      
                       <form action="actualiza.php" method="POST">                       		
                       		        
                      		<div class="ub1">
                       			<label for="cod_pro">Código Del Producto: </label>
                       			<input class="form-control" id="cod_pro" name="cod_pro" type="text" placeholder="Codigo Producto"></input>
                       		</div>
                       		<div class="ub1">
                       			<label for="nombre">Nombre del Producto: </label>
                       			<input class="form-control" id="nombre" name="nombre" type="text" placeholder="Nombre Producto"></input>
                       		</div>
                       		<div class="ub1">
                       			<label for="precio">Precio del Producto: </label>
                       			<input class="form-control" id="precio" name="precio" type="text" placeholder="Precio Producto"></input>
                       		</div>
                      		<div class="ub1">
                       			<label for="stock">Stock del Producto: </label>
                       			<input class="form-control" id="stock" name="stock" type="text" placeholder="Stock Producto"></input>
                       		</div>
                       		<div class="ub1">
                       			<label for="modelo">Modelo del Producto: </label>
                       			<input class="form-control" id="modelo" name="modelo" type="text" placeholder="Modelo Producto"></input>
                       		</div>
                       		<div class="ub1">
                       			<label for="marca">Marca del Producto: </label>
                       			<input class="form-control" id="marca" name="marca" type="text" placeholder="Marca Producto"></input>
                       		</div>



									<input type="submit" class="btn btn-primary" value="Grabar">                       
									<button type="button" class="btn btn-danger" data-dismiss="modal">Salir</button>							
                       </form>
                    </div>
                    <div class="modal-footer">
 
                    </div>
                </div>
            </div>
        </div> 



	</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>		
	<script>			 
		  $('#editUsu').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget) // Button that triggered the modal
		  var recipient0 = button.data('cod_pro')
		  var recipient1 = button.data('nombre')
		  var recipient2 = button.data('precio')
		  var recipient3 = button.data('stock')
		  var recipient4 = button.data('modelo')
		  var recipient5 = button.data('marca')

		 
		  var modal = $(this)		 
		  modal.find('.modal-body #cod_pro').val(recipient0)
		  modal.find('.modal-body #nombre').val(recipient1)
		  modal.find('.modal-body #precio').val(recipient2)
		  modal.find('.modal-body #stock').val(recipient3)		 
		  modal.find('.modal-body #modelo').val(recipient4)		 
		  modal.find('.modal-body #marca').val(recipient5)		 
		});
		
	</script>
	
</body>
</html>

<?php
	}
	else
	{
		?>
		 <META HTTP-EQUIV="Refresh" CONTENT="0; URL=index.php">
		 <?php
	}
?>