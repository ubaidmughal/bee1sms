<?php

include('db.php');
include("functionQM.php");

if(isset($_POST["QuestionId"]))
{
	
	$statement = $connection->prepare(
		"DELETE FROM tblquemaster WHERE QuestionId = :id"
	);
	$result = $statement->execute(
		array(
			':id'	=>	$_POST["QuestionId"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}



?>