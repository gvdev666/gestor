<?php
include('db.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM clientes ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE nombres LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR telefono LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"]))
{
	$query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}
else
{
	$query .= 'ORDER BY id DESC ';
}
if($_POST["length"] != -1)
{
	$query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}
$statement = $connection->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
	$sub_array = array();
	$sub_array[] = $image;
	$sub_array[] = $row["nombres"];
	$sub_array[] = $row["edad"];
	$sub_array[] = $row["telefono"];
	$sub_array[] = $row["correo"];
	$sub_array[] = $row["auto_interes"];
	$sub_array[] = $row["modelo_interes"];
	$sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning btn-xs update">Actualizar</button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-xs delete">Eliminar</button>';
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($output);
?>