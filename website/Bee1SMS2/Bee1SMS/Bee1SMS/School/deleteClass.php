<?php

include('db.php');
include("functionClass.php");

if(isset($_POST["ClassId"]))
{
	
	$statement = $connection->prepare(
		"DELETE FROM tblclasses WHERE ClassId = :id"
	);
	$result = $statement->execute(
		array(
			':id'	=>	$_POST["ClassId"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}



?>