<?php

include('db.php');
include("functionSection.php");

if(isset($_POST["SectionId"]))
{
	
	$statement = $connection->prepare(
		"DELETE FROM tblsections WHERE SectionId = :id"
	);
	$result = $statement->execute(
		array(
			':id'	=>	$_POST["SectionId"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}



?>