<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<script src="push/push.min.js"></script>
	<title>Document</title>
		<script>
			Push.create("Hola Mundo",{
				body:"prueba",
				icon:"img/u.jpg",
				timeout:4000,
				onClick: function(){
					window.location="admin.php";
					this.close();
				}
			});
		</script>
	
</head>
<body>
	
</body>
</html>