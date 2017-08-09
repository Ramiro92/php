<?php
include('db.php');
include('function.php');
if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}
		$statement = $connection->prepare("
			INSERT INTO users (carnet, first_name, last_name, trabajograduacion, egreso, graduacion, image) 
			VALUES (:carnet, :first_name, :last_name, :trabajograduacion, :egreso, :graduacion, :image)
		");
		$result = $statement->execute(
			array(
				':carnet'		=>	$_POST["carnet"],
				':first_name'	=>	$_POST["first_name"],
				':last_name'	=>	$_POST["last_name"],
				':trabajograduacion'	=>	$_POST["trabajograduacion"],
				':egreso'	=>	$_POST["egreso"],
				':graduacion'	=>	$_POST["graduacion"],
				':image'		=>	$image
			)
		);
		if(!empty($result))
		{
			echo 'Data Inserted';
		}
	}
	if($_POST["operation"] == "Edit")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}
		else
		{
			$image = $_POST["hidden_user_image"];
		}
		$statement = $connection->prepare(
			"UPDATE users 
			SET carnet =:carnet, first_name = :first_name, last_name = :last_name, trabajograduacion = :trabajograduacion , egreso = :egreso, graduacion = :graduacion, image = :image  
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':carnet'	=>	$_POST["carnet"],
				':first_name'	=>	$_POST["first_name"],
				':last_name'	=>	$_POST["last_name"],
				':trabajograduacion'	=>	$_POST["trabajograduacion"],
				':egreso'	=>	$_POST["egreso"],
				':graduacion'	=>	$_POST["graduacion"],
				':image'		=>	$image,
				':id'			=>	$_POST["user_id"]
			)
		);
		if(!empty($result))
		{
			echo 'Data Updated';
		}
	}
}

?>