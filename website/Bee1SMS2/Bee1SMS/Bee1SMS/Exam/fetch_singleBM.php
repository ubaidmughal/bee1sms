<?php
include('db.php');
include('functionBM.php');
if(isset($_POST["BookId"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tblbookmaster 
		WHERE BookId = '".$_POST["BookId"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["booknames"] = $row["BookNames"];
		$output["author"] = $row["Author"];
        $output["publisher"] = $row["Publisher"];
		$output["contactperson"] = $row["ContactPerson"];
	}
	echo json_encode($output);
}
?>