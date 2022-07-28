<html>
	<head>
		<title>OPTIMA</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
		<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>		
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
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
			<h1 align="center">Gestor de Clientes</h1>
			<br />
			<div class="table-responsive">
				<br />
				<div align="right">
					<button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Añadir</button>
				</div>
				<br /><br />
				<table id="user_data" class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="10%">ID</th>
							<th width="35%">Nombres</th>
							<th width="15%">Correo</th>
							<th width="15%">Telefono</th>
							<th width="15%">Auto de interes</th>
							<th width="15%">Modelo de interes</th>
							<th width="10%">Editara</th>
							<th width="10%">Eliminar</th>
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
					<h4 class="modal-title">Añadir Cliente</h4>
				</div>
				<div class="modal-body">
					<label>Nombres</label>
					<input type="text" name="nombres" id="nombres" class="form-control" />
					<br />
					<label>Edad</label>
					<input type="text" name="edad" id="edad" class="form-control" />
					<br />
					<label>Telefon:</label>
					<input type="text" name="telefono" id="telefono" class="form-control" />
					<br />
					<label>Correo</label>
					<input type="text" name="correo" id="correo" class="form-control" />
					<br />
					<select id="auto_interes" name="auto_interes" class="form-control">
						<option value="0">Elija auto</option>
						<option value="honda.txt">HONDA</option>
						<option value="kia.txt">KIA</option>
						<option value="ford.txt">FORD</option>
						<option value="nissan.txt">Nissan</option>
					</select>
					<select id="modelo_interes" name="modelo_interes" class="form-control">
						<option>---</option>
					</select>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="user_id" id="user_id" />
					<input type="hidden" name="operation" id="operation" />
					<input type="submit" name="action" id="action" class="btn btn-success" value="Guaradr" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</form>
	</div>
</div>

<script src="ajax.js" type="text/javascript" language="javascript" >

</script>
<script src="select.js"></script>