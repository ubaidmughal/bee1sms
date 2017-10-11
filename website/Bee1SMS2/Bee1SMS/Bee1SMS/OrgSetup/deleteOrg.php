<?php

include('db.php');
include("functionOrg.php");

if(isset($_POST["OrgId"]))
{
	
	$statement = $connection->prepare(
		"DELETE FROM tblorg WHERE OrgId = :id"
	);
	$result = $statement->execute(
		array(
			':id'	=>	$_POST["OrgId"]
		)
	);
	
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}



?>