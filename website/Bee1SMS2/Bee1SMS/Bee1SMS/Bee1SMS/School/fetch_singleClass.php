<?php
include('db.php');
include('functionClass.php');
if(isset($_POST["ClassId"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tblclasses 
		WHERE ClassId = '".$_POST["ClassId"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["ClassName"] = $row["ClassName"];
		$output["Section"] = $row["Section"];
        $output["SubjectName"] = $row["SubjectName"];
       
	}
	echo json_encode($output);
}
?>