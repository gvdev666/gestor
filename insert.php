<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		
		$statement = $connection->prepare("
			INSERT INTO clientes (nombres, edad, telefono, correo, auto_interes, modelo_interes) 
			VALUES (:nombres, :edad, :telefono, :correo, :auto_interes, :modelo_interes)
		");
		$result = $statement->execute(
			array(
				':nombres'	=>	$_POST["nombres"],
				':edad'	=>	$_POST["edad"],
				':telefono'	=>	$_POST["telefono"],
				':correo'	=>	$_POST["correo"],
				':auto_interes'	=>	$_POST["auto_interes"],
				':modelo_interes'	=>	$_POST["modelo_interes"],
			)
		);
		if(!empty($result))
		{
			echo 'Datos insertados';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		
		$statement = $connection->prepare(
			"UPDATE clientes 
			SET nombres = :nombres, edad = :edad, telefono = :telefono, correo = :correo, auto_interes = :auto_interes, modelo_interes = :modelo_interes  
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':nombres'	=>	$_POST["nombres"],
				':edad'	=>	$_POST["edad"],
				':telefono'	=>	$_POST["telefono"],
				':correo'	=>	$_POST["correo"],
				':auto_interes'	=>	$_POST["auto_interes"],
				':modelo_interes'	=>	$_POST["modelo_interes"],
				':id'			=>	$_POST["user_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Datos actualizados';
		}
	}
}

?>