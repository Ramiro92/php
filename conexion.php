<?php 
	$conexion = mysql_connect("localhost", "root", "");
	if ($conexion) {
		mysql_select_db("crud", $crud);
	}
 ?>