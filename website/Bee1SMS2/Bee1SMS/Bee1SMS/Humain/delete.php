<?php

include('db.php');
include("function.php");

if(isset($_POST["TId"]))
{
	
	$statement = $connection->prepare(
		"DELETE FROM tblteachers WHERE TId = :id"
	);
	$result = $statement->execute(
		array(
			':id'	=>	$_POST["TId"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}



?>