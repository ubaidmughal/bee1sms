<?php
include('db.php');
include('functionStudent.php');
if(isset($_POST["StudentId"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tblstudent 
		WHERE StudentId = '".$_POST["StudentId"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["StudentCode"] = $row["StudentCode"];
		$output["StudentName"] = $row["StudentName"];
        $output["FamilyGroup"] = $row["FamilyGroup"];
		$output["Class"] = $row["Class"];
        $output["FatherName"] = $row["FatherName"];
        $output["Age"] = $row["Age"];
        $output["DOB"] = $row["DOB"];
        $output["Address"] = $row["Address"];
        $output["ContactPerson"] = $row["ContactPerson"];
	}
	echo json_encode($output);
}
?>