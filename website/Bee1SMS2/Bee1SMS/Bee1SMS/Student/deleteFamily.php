<?php

include('db.php');
include("functionStudent.php");

if(isset($_POST["FamilyId"]))
{
	
	$statement = $connection->prepare(
		"DELETE FROM tblfamilygroup WHERE FamilyId = :id"
	);
	$result = $statement->execute(
		array(
			':id'	=>	$_POST["FamilyId"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}



?>