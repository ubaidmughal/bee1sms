<?php

include('db.php');
include("functionContact.php");

if(isset($_POST["ContactId"]))
{
	
	$statement = $connection->prepare(
		"DELETE FROM tblcontacts WHERE ContactId = :id"
	);
	$result = $statement->execute(
		array(
			':id'	=>	$_POST["ContactId"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}



?>