<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Accesorios de Celulares y Equipos de Computo</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/estilos.css">
</head>
<style>
body
{
	background-color: black;
	top:50%;
	left:50%;
	position: absolute;
	transform: translate(-50%,-50%);
}
*
{
	font-family:arial;
	text-align:center;
	margin: 0;
	padding: 0;
}
.caja1
{
	background-color: white;
	width:26em;
    height: 28em;
    position: relative;
    margin: auto;
    padding: 1em;
	color:black;
	border-radius:1em;
	overflow: hidden; 
}
.botondeintercambiar{
    width: 240px;
    margin: 20px auto;
    position: relative;
    border-radius: 30px;
}
#btnvai{
    top: 0;
    left: 0;
    position: absolute;
    width: 130px;
    height: 100%;
    border-radius: 30px;
	transition: .5s;
}
#frmlogin{
    left: 50px;
}
.grupo-entradas{
    position: absolute;
    width:20em;
	height: auto;
    transition: .5s;
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

input[type=submit],input[type=reset]
{
border-bottom:0.1em solid #BDBFC1;
margin-top: 1em;
width:48%;
text-align:center;
background-color: black;
color:white;
cursor:pointer;
}
input[type=checkbox]
{
margin-left:0;
width:10%;
cursor:pointer;
}
</style>
<body>
	<label style="color: white; font-size: 40px">Accessorios de Celulares y Equipos de Computo</label>
	<div class="caja1">
        <div class="botondeintercambiar">
            <div id="btnvai" class="ub1"></div>
            <label>INICIAR SESIÓN</label> 
    	</div>
			<form action="index.php" method="post" id="frmlogin" class="grupo-entradas">
				<div class="ub1">&#128273;	
					<label for="usu">Usuario:</label>
					<input class="form-control" id="usu" type="text" name="txtlogin" required="true" placeholder="Ingresar usuario">
				</div>
				<div class="ub1">&#128274;	
					<label for="pass">Password:</label>
					<input class="form-control" id="pass" type="password" name="txtpass" required="true" placeholder="Ingresar password">
				</div>
				<div class="ub1">
					<input type="checkbox" onclick="verpassword()" > Mostrar contraseña
 				</div>
 				<br>
 				<div align="center">
					<input type="submit" class="btn btn-primary" value="Ingresar">
					<input type="reset" class="btn btn-success" value="Cancelar">
				</div>
			</form>
		</div>
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/metodos.js"></script>
</body>
<script>
  function verpassword()
  {
      var tipo = document.getElementById("pass");
      if(tipo.type == "password")
	  {
          tipo.type = "text";
      }
	  else 
	  {
          tipo.type = "password";
      } 
  }
    var x = document.getElementById("frmlogin");
    var y = document.getElementById("frmregistrar");
    var z = document.getElementById("btnvai");
        function registrarvai()
		{
			
            x.style.left = "-400px";
            y.style.left = "50px";
            z.style.left = "110px";
        }
            function loginvai()
		{
			
            x.style.left = "50px";
            y.style.left = "450px";
            z.style.left = "0";
        }
</script>
</html>

<?php
	if(isset($_POST['txtpass'])) 
	{
		session_start();
		//variable de conexion: recibe dirección del host , usuario, contraseña y el nombre base de datos
		$mysqli = new mysqli("localhost", "root", "", "web") or die ("Error de conexion porque: ".$mysqli->connect_errno);
		// comprobar la conexión 
		if (mysqli_connect_errno()) 
		{
	    	printf("Falló la conexión: %s\n", mysqli_connect_error());
	   		exit();
		}

		$login = $mysqli->real_escape_string($_POST['txtlogin']);	
		$pass = $mysqli->real_escape_string($_POST['txtpass']);
		
		$resultado = $mysqli->query("SELECT * FROM tbusuario where login='$login' and pass='$pass' and activo!=0");
		$valida=$resultado->num_rows;
		if($valida != 0)
		{
			$datosUsu = $resultado->fetch_row();
			$_SESSION['nombreusu'] = $datosUsu[3];
			$_SESSION['perfil'] = $datosUsu[4];				
			echo "<META HTTP-EQUIV='Refresh' CONTENT='0; URL=listar.php'>";
		}
		else
		{
			echo 
			"<script> 
				var textnode = document.createTextNode('Usuario ó Password Incorrecto');
				document.getElementById('msg').appendChild(textnode);
			</script>";
			
		}	
	}
	
	
?>

		