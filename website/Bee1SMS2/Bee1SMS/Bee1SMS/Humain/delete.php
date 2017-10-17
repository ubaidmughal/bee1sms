<?php

include('db.php');
include("function.php");

if(isset($_POST["EmpId"]))
{
	
	$statement = $connection->prepare(
		"DELETE FROM tblhresources WHERE EmpId = :id"
	);
	$result = $statement->execute(
		array(
			':id'	=>	$_POST["EmpId"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}



?>