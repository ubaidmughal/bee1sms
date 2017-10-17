<?php

include('db.php');
include("functionAdmin.php");

if(isset($_POST["AdminId"]))
{
	
	$statement = $connection->prepare(
		"DELETE FROM tbluser WHERE AdminId = :id"
	);
	$result = $statement->execute(
		array(
			':id'	=>	$_POST["AdminId"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}



?>