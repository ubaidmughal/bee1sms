<?php

include('db.php');
include("functionSchool.php");

if(isset($_POST["SchoolId"]))
{
	
	$statement = $connection->prepare(
		"DELETE FROM tblschoolinfo WHERE SchoolId = :id"
	);
	$result = $statement->execute(
		array(
			':id'	=>	$_POST["SchoolId"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}



?>