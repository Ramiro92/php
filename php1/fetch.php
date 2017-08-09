<?php
include('db.php');
include('function.php');
$query = '';
$output = array();
$query .= "SELECT * FROM users ";
if(isset($_POST["search"]["value"]))
{
	$query .= 'WHERE first_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR last_name LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR carnet LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR trabajograduacion LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR egreso LIKE "%'.$_POST["search"]["value"].'%" ';
	$query .= 'OR graduacion LIKE "%'.$_POST["search"]["value"].'%" ';
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
	$image = '';
	if($row["image"] != '')
	{
		$image = '<img src="upload/'.$row["image"].'" class="img-thumbnail" width="50" height="35" />';
	}
	else
	{
		$image = '';
	}
	$sub_array = array();
	$sub_array[] = $image;
	$sub_array[] = $row["carnet"];
	$sub_array[] = $row["first_name"];
	$sub_array[] = $row["last_name"];
	$sub_array[] = $row["trabajograduacion"];
	$sub_array[] = $row["egreso"];
	$sub_array[] = $row["graduacion"];

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