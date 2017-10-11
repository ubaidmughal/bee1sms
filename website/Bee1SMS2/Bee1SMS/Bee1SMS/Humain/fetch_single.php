<?php
include('db.php');
include('function.php');
if(isset($_POST["TId"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tblteachers 
		WHERE TId = '".$_POST["TId"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["teachercontact"] = $row["teachercontact"];
		$output["teacherqualification"] = $row["teacherqualification"];
		
	}
	echo json_encode($output);
}
?>