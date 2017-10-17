<?php
include('db.php');
include('functionSubject.php');
if(isset($_POST["SubjectId"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tblsubject
		WHERE SubjectId = '".$_POST["SubjectId"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["SubjectName"] = $row["SubjectName"];
		
       
	}
	echo json_encode($output);
}
?>