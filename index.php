<html>
	<head>
		<title>Administracion</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>		
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
				<script src="push/push.min.js"></script>
		<script>
				Push.create("Hola Mundo",{
					body:"prueba",
					icon:"img/u.jpg",
					timeout:4000,
					onClick: function(){
						window.focus();
						this.close();
					}
				});
		</script>
		<style>
			body
			{
				margin:0;
				padding:0;
				background-color:#f1f1f1;
			}
			.box
			{
				width:1270px;
				padding:20px;
				background-color:#fff;
				border:1px solid #ccc;
				border-radius:5px;
				margin-top:25px;
			}
		</style>
	</head>
	<body>
		<div class="container box">
			<h1 align="center">Administracion de estudiantes</h1>
			<br />
			<div class="table-responsive">
				<br />
				<div align="right">
					<button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Nuevo Usuario</button>
				</div>
				<br /><br />
				<table id="user_data" class="table table-bordered table-striped table-bordered">
					<thead>
						<tr>
							<th width="1%">Imagen</th>
							<th width="12%">Carnet</th>
							<th width="35%">Nombres</th>
							<th width="35%">Apellidos</th>
							<th width="5%">Trabajo de graduacion</th>
							<th width="5%">Egresado</th>
							<th width="5%">Graduacion</th>
							<th width="2%">Modificar</th>
							<th width="2%">Eliminar</th>
						</tr>
					</thead>
				</table>
				
			</div>
		</div>
	</body>
</html>

<div id="userModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="user_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Agregar Usuario</h4>
				</div>
				<div class="modal-body">
					<label>Agregar Carnet</label>
					<input type="text" name="carnet" id="carnet" class="form-control" />
					<br />					
					<label>Agregar Nombre</label>
					<input type="text" name="first_name" id="first_name" class="form-control" />
					<br />
					<label>Agregar Apellido</label>
					<input type="text" name="last_name" id="last_name" class="form-control" />
					<br />
					<label>Seleciona una imagen</label>
					<input type="file" name="user_image" id="user_image" />
					<span id="user_uploaded_image"></span>
					<label>Trabajo de graduacion</label>
					<input type="date" name="trabajograduacion" id="trabajograduacion" class="form-control" />
					<br />
					<label>Egreso</label>
					<input type="date" name="egreso" id="egreso" class="form-control" />
					<br />
					<label>Graduacion</label>
					<input type="date" name="graduacion" id="graduacion" class="form-control" />
					<br />							
				</div>
				<div class="modal-footer">
					<input type="hidden" name="user_id" id="user_id" />
					<input type="hidden" name="operation" id="operation" />
					<input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</form>
	</div>
</div>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
	$('#add_button').click(function(){
		$('#user_form')[0].reset();
		$('.modal-title').text("Agregar Usuario");
		$('#action').val("Add");
		$('#operation').val("Add");
		$('#user_uploaded_image').html('');
	});
	
	var dataTable = $('#user_data').DataTable({
		"processing":true,
		"serverSide":true,
		"order":[],
		"ajax":{
			url:"fetch.php",
			type:"POST"
		},
		"columnDefs":[
			{
				"targets":[0, 8, 7],
				"orderable":false,
			},
		],

	});

	$(document).on('submit', '#user_form', function(event){
		event.preventDefault();
		var carnet = $('#carnet').val();
		var firstName = $('#first_name').val();
		var lastName = $('#last_name').val();
		var trabajograduacion = $('#trabajograduacion').val();
		var egreso = $('#egreso').val();
		var graduacion = $('#graduacion').val();
		var extension = $('#user_image').val().split('.').pop().toLowerCase();
		if(extension != '')
		{
			if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
			{
				alert("Invalid Image File");
				$('#user_image').val('');
				return false;
			}
		}	
		if(carnet != '' && firstName != '' && lastName != '' && trabajograduacion !='' && egreso !='' && graduacion !='')
		{
			$.ajax({
				url:"insert.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					alert(data);
					$('#user_form')[0].reset();
					$('#userModal').modal('hide');
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			alert("Both Fields are Required");
		}
	});
	
	$(document).on('click', '.update', function(){
		var user_id = $(this).attr("id");
		$.ajax({
			url:"fetch_single.php",
			method:"POST",
			data:{user_id:user_id},
			dataType:"json",
			success:function(data)
			{
				$('#userModal').modal('show');
				$('#carnet').val(data.carnet);				
				$('#first_name').val(data.first_name);
				$('#last_name').val(data.last_name);
				$('#trabajograduacion').val(data.trabajograduacion);
				$('#egreso').val(data.egreso);
				$('#graduacion').val(data.graduacion);
				$('.modal-title').text("Edit User");
				$('#user_id').val(user_id);
				$('#user_uploaded_image').html(data.user_image);
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});
	
	$(document).on('click', '.delete', function(){
		var user_id = $(this).attr("id");
		if(confirm("Desea borrar el usuario?"))
		{
			$.ajax({
				url:"delete.php",
				method:"POST",
				data:{user_id:user_id},
				success:function(data)
				{
					alert(data);
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			return false;	
		}
	});
	
	
});
</script>
