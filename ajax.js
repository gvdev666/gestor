$(document).ready(function(){
	$('#add_button').click(function(){
		$('#user_form')[0].reset();
		$('.modal-title').text("Añadir Cliente");
		$('#action').val("Add");
		$('#operation').val("Add");
		
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
				"targets":[0, 3, 4],
				"orderable":false,
			},
		],

	});

	$(document).on('submit', '#user_form', function(event){
		event.preventDefault();
		var nombres = $('#nombres').val();
		var edad = $('#edad').val();
		var telefono = $('#telefono').val();
        var correo = $('#correo').val();
        var auto_interes = $('#auto_interes').val();
        var modelo_interes = $('#modelo_interes').val();
		
		if(nombres != '' && edad != '' &&telefono != '' && correo != '' && auto_interes != '' && modelo_interes != '')
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
			alert("Se requieren ambos campos");
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
				$('#nombres').val(data.nombres);
				$('#edad').val(data.edad);
				$('#telefono').val(data.telefono);
				$('#correo').val(data.correo);
				$('#auto_interes').val(data.auto_interes);
				$('#modelo_interes').val(data.modelo_interes);
				$('.modal-title').text("Editar Cliente");
				$('#user_id').val(user_id);
				$('#action').val("Edit");
				$('#operation').val("Edit");
			}
		})
	});
	
	$(document).on('click', '.delete', function(){
		var user_id = $(this).attr("id");
		if(confirm("Una vez que eliminas no puedes traerlo de vuelta, seguro?"))
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