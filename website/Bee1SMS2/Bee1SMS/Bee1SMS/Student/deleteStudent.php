<?php

include('db.php');
include("functionStudent.php");

if(isset($_POST["StudentId"]))
{
	
	$statement = $connection->prepare(
		"DELETE FROM tblstudent WHERE StudentId = :id"
	);
	$result = $statement->execute(
		array(
			':id'	=>	$_POST["StudentId"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}



?>