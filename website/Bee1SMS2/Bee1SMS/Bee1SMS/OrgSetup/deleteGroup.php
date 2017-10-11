<?php

include('db.php');
include("functionGroup.php");

if(isset($_POST["GroupId"]))
{
	
	$statement = $connection->prepare(
		"DELETE FROM tblmenugroup WHERE GroupId = :id"
	);
	$result = $statement->execute(
		array(
			':id'	=>	$_POST["GroupId"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}



?>