<?php

////////////////// CONEXION A LA BASE DE DATOS ////////////////////////////////////

$host="localhost";
$usuario="root";
$contraseña="";
$base="crud";

$conexion= new mysqli($host, $usuario, $contraseña, $base);
if ($conexion -> connect_errno)
{
	die("Fallo la conexion:(".$conexion -> mysqli_connect_errno().")".$conexion-> mysqli_connect_error());
}
////////////////// VARIABLES DE CONSULTA////////////////////////////////////

$where="";
$nombre=$_POST['first_name'];
$carrera=$_POST['carnet'];
$limit=$_POST['xregistros'];

////////////////////// BOTON BUSCAR //////////////////////////////////////

if (isset($_POST['buscar']))
{

	

	if (empty($_POST['carnet']))
	{
		$where="where first_name like '".$nombre."%'";
	}

	else if (empty($_POST['first_name']))
	{
		$where="where canet='".$carrera."'";
	}

	else
	{
		$where="where first_name like '".$nombre."%' and carnet='".$carrera."'";
	}
}
/////////////////////// CONSULTA A LA BASE DE DATOS ////////////////////////

$alumnos="SELECT * FROM users $where $limit";
$resAlumnos=$conexion->query($alumnos);
$resCarreras=$conexion->query($alumnos);

if(mysqli_num_rows($resAlumnos)==0)
{
	$mensaje="<h1>No hay registros que coincidan con su criterio de búsqueda.</h1>";
}
?>
<html lang="es">

	<head>
		<title>Filtro de Búsqueda PHP</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>

		<link href="css/estilos.css" rel="stylesheet">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

	</head>
	<body>
		<header>
			<div class="alert alert-info">
			<h2>Filtro de Búsqueda PHP</h2>
			</div>
		</header>
		<section>
			<form method="post">
				<input type="text" placeholder="Nombre..." name="first_name"/>
				<select name="carnet">
					<option value="">Carrera </option>
					<?
						while ($registroCarreras = $resCarreras->fetch_array(MYSQLI_BOTH))
						{
							echo '<option value="'.$registroCarreras['carnet'].'">'.$registroCarreras['carnet'].'</option>';
						}
					?>
				</select>

				<select name="xregistros">
					<option value="">No. de Registros</option>
					<option value="limit 3">3</option>
					<option value="limit 6">6</option>
					<option value="limit 9">9</option>
				</select>
				<button name="buscar" type="submit">Buscar</button>
			</form>
			<table class="table">
				<tr>
					<th>ID_Alumno</th>
					<th>Nombre</th>
					<th>Carrera</th>
					<th>Grupo</th>
				</tr>

				<?php

				while ($registroAlumnos = $resAlumnos->fetch_array(MYSQLI_BOTH))
				{

					echo'<tr>
						 <td>'.$registroAlumnos['id_alumno'].'</td>
						 <td>'.$registroAlumnos['first_name'].'</td>
						 <td>'.$registroAlumnos['carnet'].'</td>
						 <td>'.$registroAlumnos['grupo'].'</td>
						 </tr>';
				}
				?>
			</table>

			<?
				echo $mensaje;
			?>
		</section>
	</body>
</html>


