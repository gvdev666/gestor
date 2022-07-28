<?php
include('db.php');
include('function.php');
if(isset($_POST["user_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM clientes 
		WHERE id = '".$_POST["user_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["nombres"] = $row["nombres"];
		$output["edad"] = $row["edad"];
		$output["telefono"] = $row["telefono"];
		$output["correo"] = $row["correo"];
		$output["auto_interes"] = $row["auto_interes"];
		$output["modelo_interes"] = $row["modelo_interes"];
		
	}
	echo json_encode($output);
}
?>