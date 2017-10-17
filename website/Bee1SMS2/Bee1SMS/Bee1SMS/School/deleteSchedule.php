<?php

include('db.php');
include("functionSchedule.php");

if(isset($_POST["ClassSectionId"]))
{
	
	$statement = $connection->prepare(
		"DELETE FROM tblclssecschedule WHERE ClassSectionId = :id"
	);
	$result = $statement->execute(
		array(
			':id'	=>	$_POST["ClassSectionId"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}



?>