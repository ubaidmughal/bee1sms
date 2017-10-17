<?php

include('db.php');
include("functionBM.php");

if(isset($_POST["BookId"]))
{
	
	$statement = $connection->prepare(
		"DELETE FROM tblbookmaster WHERE BookId = :id"
	);
	$result = $statement->execute(
		array(
			':id'	=>	$_POST["BookId"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}



?>