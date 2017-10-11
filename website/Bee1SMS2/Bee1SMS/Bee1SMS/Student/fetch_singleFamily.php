<?php
include('db.php');
include('functionStudent.php');
if(isset($_POST["FamilyId"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tblfamilygroup 
		WHERE FamilyId = '".$_POST["FamilyId"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["FamilyCode"] = $row["FamilyCode"];
		$output["FamilyName"] = $row["FamilyName"];
        $output["StudentName"] = $row["StudentName"];
		
	}
	echo json_encode($output);
}
?>