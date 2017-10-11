<?php

include('db.php');
include("functionMenu.php");

if(isset($_POST["MenuId"]))
{
	
	$statement = $connection->prepare(
		"DELETE FROM tblmenus WHERE MenuId = :id"
	);
	$result = $statement->execute(
		array(
			':id'	=>	$_POST["MenuId"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}



?>