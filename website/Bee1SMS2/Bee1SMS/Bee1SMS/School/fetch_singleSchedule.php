<?php
include('db.php');
include('functionSchedule.php');
if(isset($_POST["ClassSectionId"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tblclssecschedule 
		WHERE ClassSectionId = '".$_POST["ClassSectionId"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["FromTime"] = $row["FromTime"];
		$output["ToTime"] = $row["ToTime"];
        $output["Occurs"] = $row["Occurs"];
		$output["TeacherSubject"] = $row["TeacherSubject"];
	}
	echo json_encode($output);
}
?>