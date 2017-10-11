<?php
include('db.php');
include('functionActivity.php');
if(isset($_POST["ActivityId"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tblactivities 
		WHERE ActivityId = '".$_POST["ActivityId"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["ActivityName"] = $row["ActivityName"];
		$output["ActivityDescription"] = $row["ActivityDescription"];
        
	}
	echo json_encode($output);
}
?>