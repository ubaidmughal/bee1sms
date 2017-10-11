<?php

include('db.php');
include("functionActivity.php");

if(isset($_POST["ActivityId"]))
{
	
	$statement = $connection->prepare(
		"DELETE FROM tblactivities WHERE ActivityId = :id"
	);
	$result = $statement->execute(
		array(
			':id'	=>	$_POST["ActivityId"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}



?>