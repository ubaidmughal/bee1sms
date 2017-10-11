<?php

include('db.php');
include("functionSubject.php");

if(isset($_POST["SubjectId"]))
{
	
	$statement = $connection->prepare(
		"DELETE FROM tblsubject WHERE SubjectId = :id"
	);
	$result = $statement->execute(
		array(
			':id'	=>	$_POST["SubjectId"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}



?>