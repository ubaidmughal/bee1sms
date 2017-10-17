<?php
include('db.php');
include('functionSchool.php');
if(isset($_POST["SchoolId"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tblschoolinfo 
		WHERE SchoolId = '".$_POST["SchoolId"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["SchoolName"] = $row["SchoolName"];
		$output["Reg"] = $row["Reg"];
        $output["Address"] = $row["Address"];
        $output["Latitude"] = $row["latitude"];
        $output["Longitude"] = $row["longitude"];
	}
	echo json_encode($output);
}
?>